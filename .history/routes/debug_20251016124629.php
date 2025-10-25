<?php

Route::get('/debug/questions', function() {
    $questions = \App\Services\AssessmentQuestions\PTSDDiagnosticQuestions::getAllQuestions();
    echo "<h1>Total Questions: " . count($questions) . "</h1>";
    
    foreach ($questions as $number => $question) {
        echo "<div style='margin: 10px; padding: 10px; border: 1px solid #ccc;'>";
        echo "<strong>Question $number:</strong> $question";
        echo "</div>";
    }
    
    if (isset($questions[30])) {
        echo "<h2 style='color: green;'>Question 30 EXISTS: " . $questions[30] . "</h2>";
    } else {
        echo "<h2 style='color: red;'>Question 30 NOT FOUND</h2>";
    }
});