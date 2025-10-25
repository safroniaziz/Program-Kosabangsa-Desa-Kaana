<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Assessment Kesiapan Mental Tanggap Bencana</title>
    <style>
        @page {
            margin: 20mm;
            size: A4;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            line-height: 1.6;
            color: #333;
            background: white;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 20px;
        }

        .header h1 {
            color: #1e40af;
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .header h2 {
            color: #64748b;
            font-size: 16px;
            font-weight: normal;
        }

        .meta-info {
            background: #f8fafc;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 4px solid #3b82f6;
        }

        .meta-info table {
            width: 100%;
            border-collapse: collapse;
        }

        .meta-info td {
            padding: 5px 0;
            font-size: 12px;
        }

        .meta-info td:first-child {
            font-weight: bold;
            width: 30%;
            color: #374151;
        }

        .result-summary {
            background: #f0f9ff;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            text-align: center;
            border: 2px solid #0ea5e9;
        }

        .status-badge {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .status-aman {
            background: #10b981;
            color: white;
        }

        .status-waspada {
            background: #f59e0b;
            color: white;
        }

        .status-kritis {
            background: #dc2626;
            color: white;
        }

        .score-grid {
            display: table;
            width: 100%;
            margin: 20px 0;
        }

        .score-card {
            display: table-cell;
            background: white;
            padding: 15px;
            text-align: center;
            border: 2px solid #e5e7eb;
            width: 33.33%;
        }

        .score-value {
            font-size: 20px;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 5px;
        }

        .score-label {
            font-size: 10px;
            color: #64748b;
            font-weight: 600;
        }

        .sections {
            margin-top: 30px;
        }

        .section {
            margin-bottom: 25px;
            page-break-inside: avoid;
        }

        .section-header {
            background: #1e40af;
            color: white;
            padding: 12px 15px;
            font-weight: bold;
            font-size: 14px;
        }

        .section-content {
            border: 2px solid #1e40af;
            border-top: none;
            padding: 15px;
            background: #f8fafc;
        }

        .question {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .question:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .question-text {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 12px;
        }

        .answer {
            background: white;
            padding: 8px;
            border-left: 4px solid #10b981;
            font-size: 11px;
            color: #059669;
            font-weight: 500;
        }

        .recommendation {
            background: #fef3c7;
            border: 2px solid #f59e0b;
            padding: 20px;
            margin-top: 30px;
        }

        .recommendation h3 {
            color: #92400e;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .recommendation p {
            color: #78350f;
            font-size: 12px;
            line-height: 1.6;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            color: #64748b;
            font-size: 10px;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN ASSESSMENT KESIAPAN MENTAL</h1>
        <h2>Program Tanggap Bencana Desa Kaana</h2>
    </div>

    <div class="meta-info">
        <table>
            <tr>
                <td>Tanggal Assessment:</td>
                <td>{{ $timestamp->format('d F Y, H:i') }}</td>
            </tr>
            <tr>
                <td>Nama Peserta:</td>
                <td>{{ $participantName }}</td>
            </tr>
            <tr>
                <td>Total Pertanyaan:</td>
                <td>{{ $totalQuestions }}</td>
            </tr>
            <tr>
                <td>Skor Total:</td>
                <td>{{ $totalScore }} dari {{ $totalQuestions * 4 }}</td>
            </tr>
        </table>
    </div>

    <div class="result-summary">
        <div class="status-badge {{ $status['class'] }}">{{ $status['level'] }}</div>
        <h3 style="margin-bottom: 10px; color: #374151;">{{ $status['title'] }}</h3>
        <div class="score-grid">
            <div class="score-card">
                <div class="score-value">{{ round(($averageScore/4) * 100) }}%</div>
                <div class="score-label">Skor Keseluruhan</div>
            </div>
            <div class="score-card">
                <div class="score-value">{{ $totalQuestions }}</div>
                <div class="score-label">Soal Dijawab</div>
            </div>
            <div class="score-card">
                <div class="score-value">{{ count($sections) }}</div>
                <div class="score-label">Bagian Selesai</div>
            </div>
        </div>
    </div>

    <div class="recommendation">
        <h3>Evaluasi dan Rekomendasi</h3>
        <p>{{ $status['description'] }}</p>
    </div>

    <div class="sections">
        <h2 style="color: #1e40af; margin-bottom: 20px; font-size: 18px;">Detail Jawaban Per Bagian</h2>
        @foreach($sections as $sectionIndex => $section)
            <div class="section">
                <div class="section-header">
                    {{ $sectionIndex + 1 }}. {{ $section['title'] }}
                </div>
                <div class="section-content">
                    <p style="margin-bottom: 15px; color: #6b7280; font-style: italic; font-size: 11px;">
                        {{ $section['description'] }}
                    </p>

                    @foreach($section['questions'] as $questionIndex => $question)
                        <div class="question">
                            <div class="question-text">
                                {{ $questionIndex + 1 }}. {{ $question['text'] }}
                            </div>
                            <div class="answer">
                                @php
                                    $userAnswer = $answers[$question['id']] ?? null;
                                    $selectedOption = collect($question['options'])->firstWhere('value', $userAnswer);
                                @endphp

                                @if($selectedOption)
                                    ✓ {{ $selectedOption['text'] }} (Nilai: {{ $selectedOption['value'] }}/4)
                                @else
                                    Tidak dijawab
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <div class="footer">
        <p><strong>Program Kosabangsa Desa Kaana</strong></p>
        <p>Laporan ini dibuat secara otomatis pada {{ now()->format('d F Y, H:i') }}</p>
        <p style="margin-top: 10px; font-style: italic;">
            "Kesiapan mental adalah kunci sukses dalam menghadapi tantangan bencana alam"
        </p>
    </div>
</body>
</html>
