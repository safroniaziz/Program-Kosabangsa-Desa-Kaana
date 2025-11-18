<?php

require_once 'vendor/autoload.php';

use App\Models\UserAssessment;
use App\Services\AssessmentCalculationService;

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$calculationService = new AssessmentCalculationService();

// Get all completed assessments that don't have overall_risk_level set
$assessments = UserAssessment::where('status', 'completed')
    ->whereNull('overall_risk_level')
    ->get();

echo "Found " . $assessments->count() . " assessments to fix\n";

foreach ($assessments as $assessment) {
    try {
        // Get the results from the results column
        $results = $assessment->results;
        
        if (isset($results['risk_level'])) {
            // Update the overall_risk_level
            $assessment->update([
                'overall_risk_level' => $results['risk_level']
            ]);
            
            echo "Fixed assessment ID: " . $assessment->id . " - Risk level: " . $results['risk_level'] . "\n";
        } else {
            echo "No risk_level found in results for assessment ID: " . $assessment->id . "\n";
        }
    } catch (Exception $e) {
        echo "Error fixing assessment ID: " . $assessment->id . " - " . $e->getMessage() . "\n";
    }
}

echo "Done!\n";
