<?php

require_once 'vendor/autoload.php';

use App\Models\UserAssessment;
use App\Services\AssessmentCalculationService;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$calculationService = new AssessmentCalculationService();

// Get all completed assessments that have no results or empty results
$assessments = UserAssessment::where('status', 'completed')
    ->where(function($query) {
        $query->whereNull('results')
              ->orWhere('results', '[]')
              ->orWhere('results', '{}');
    })
    ->get();

echo "Found " . $assessments->count() . " assessments to fix\n";

foreach ($assessments as $assessment) {
    try {
        echo "Processing assessment ID: " . $assessment->id . "\n";
        
        // Recalculate results
        $results = $calculationService->calculatePTSDDiagnostic($assessment);
        
        // Update the assessment with new results
        $assessment->update([
            'results' => $results
        ]);
        
        echo "Fixed assessment ID: " . $assessment->id . " - Results: " . json_encode($results) . "\n";
    } catch (Exception $e) {
        echo "Error fixing assessment ID: " . $assessment->id . " - " . $e->getMessage() . "\n";
    }
}

echo "Done!\n";
