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
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background: white;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 20px;
        }

        .header h1 {
            color: #1e40af;
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .header h2 {
            color: #64748b;
            font-size: 18px;
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
            font-size: 14px;
        }

        .meta-info td:first-child {
            font-weight: bold;
            width: 30%;
            color: #374151;
        }

        .result-summary {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
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
            font-size: 18px;
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
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin: 20px 0;
        }

        .score-card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            border: 2px solid #e5e7eb;
        }

        .score-value {
            font-size: 24px;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 5px;
        }

        .score-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
        }

        .sections {
            margin-top: 30px;
        }

        .section {
            margin-bottom: 25px;
            break-inside: avoid;
        }

        .section-header {
            background: #1e40af;
            color: white;
            padding: 12px 15px;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
            font-size: 16px;
        }

        .section-content {
            border: 2px solid #1e40af;
            border-top: none;
            border-radius: 0 0 8px 8px;
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
            font-size: 14px;
        }

        .answer {
            background: white;
            padding: 10px;
            border-radius: 6px;
            border-left: 4px solid #10b981;
            font-size: 13px;
            color: #059669;
            font-weight: 500;
        }

        .recommendation {
            background: #fef3c7;
            border: 2px solid #f59e0b;
            border-radius: 12px;
            padding: 20px;
            margin-top: 30px;
        }

        .recommendation h3 {
            color: #92400e;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .recommendation p {
            color: #78350f;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            color: #64748b;
            font-size: 12px;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .no-print {
                display: none;
            }
        }

        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #3b82f6;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }

        .print-button:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(59, 130, 246, 0.4);
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="print-button no-print">🖨️ Cetak Laporan</button>

    <div class="header">
        <h1>LAPORAN ASSESSMENT KESIAPAN MENTAL</h1>
        <h2>Program Tanggap Bencana Desa Kaana</h2>
    </div>

    <div class="meta-info">
        <table>
            <tr>
                <td>Tanggal Assessment:</td>
                <td id="assessment-date">-</td>
            </tr>
            <tr>
                <td>Nama Peserta:</td>
                <td id="participant-name">Peserta Assessment</td>
            </tr>
            <tr>
                <td>Total Pertanyaan:</td>
                <td id="total-questions">-</td>
            </tr>
            <tr>
                <td>Waktu Penyelesaian:</td>
                <td id="completion-time">-</td>
            </tr>
        </table>
    </div>

    <div class="result-summary">
        <div id="status-badge" class="status-badge">-</div>
        <h3 id="recommendation-title" style="margin-bottom: 10px; color: #374151;">-</h3>
        <div class="score-grid">
            <div class="score-card">
                <div id="overall-score" class="score-value">-</div>
                <div class="score-label">Skor Keseluruhan</div>
            </div>
            <div class="score-card">
                <div id="answered-questions" class="score-value">-</div>
                <div class="score-label">Soal Dijawab</div>
            </div>
            <div class="score-card">
                <div id="sections-completed" class="score-value">-</div>
                <div class="score-label">Bagian Selesai</div>
            </div>
        </div>
    </div>

    <div id="detailed-description" class="recommendation">
        <h3>Evaluasi dan Rekomendasi</h3>
        <p id="detailed-text">-</p>
    </div>

    <div class="sections">
        <h2 style="color: #1e40af; margin-bottom: 20px; font-size: 20px;">Detail Jawaban Per Bagian</h2>
        <div id="sections-container">
            <!-- Sections will be populated by JavaScript -->
        </div>
    </div>

    <div class="footer">
        <p><strong>Program Kosabangsa Desa Kaana</strong></p>
        <p>Laporan ini dibuat secara otomatis pada <span id="report-generated">-</span></p>
        <p style="margin-top: 10px; font-style: italic;">
            "Kesiapan mental adalah kunci sukses dalam menghadapi tantangan bencana alam"
        </p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get data from URL parameters or sessionStorage
            const urlParams = new URLSearchParams(window.location.search);
            const reportDataParam = urlParams.get('data');

            let reportData = null;

            if (reportDataParam) {
                try {
                    reportData = JSON.parse(decodeURIComponent(reportDataParam));
                } catch (e) {
                    console.error('Error parsing report data from URL:', e);
                }
            }

            if (!reportData) {
                try {
                    const sessionData = sessionStorage.getItem('pdfReportData');
                    if (sessionData) {
                        reportData = JSON.parse(sessionData);
                    }
                } catch (e) {
                    console.error('Error parsing report data from session:', e);
                }
            }

            if (!reportData) {
                document.body.innerHTML = '<div style="text-align: center; padding: 50px; color: #dc2626;"><h2>Data assessment tidak ditemukan</h2><p>Silakan lakukan assessment terlebih dahulu.</p></div>';
                return;
            }

            populateReport(reportData);
        });

        function populateReport(data) {
            try {
                // Basic information
                const assessmentDate = new Date(data.timestamp).toLocaleDateString('id-ID', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });

                document.getElementById('assessment-date').textContent = assessmentDate;
                document.getElementById('participant-name').textContent = data.participantName || 'Peserta Assessment';
                document.getElementById('total-questions').textContent = data.totalQuestions || 0;
                document.getElementById('completion-time').textContent = 'Selesai';
                document.getElementById('report-generated').textContent = new Date().toLocaleDateString('id-ID', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });

                // Calculate scores and status
                const answers = data.answers || {};
                const totalQuestions = Object.keys(answers).length;
                const totalScore = Object.values(answers).reduce((sum, value) => sum + value, 0);
                const averageScore = totalScore / totalQuestions;

                let status, statusClass, recommendation, detailRecommendation;

                if (averageScore >= 2.5) {
                    status = 'AMAN';
                    statusClass = 'status-aman';
                    recommendation = 'Kesiapan Mental Sangat Baik';
                    detailRecommendation = 'Hasil assessment menunjukkan bahwa mental Anda dalam kondisi prima dan siap menghadapi situasi darurat. Anda memiliki kesiapan yang baik dalam mengelola stress dan mengambil keputusan dalam situasi sulit. Pertahankan kondisi ini dengan terus berlatih dan membantu orang lain dalam persiapan tanggap bencana.';
                } else if (averageScore >= 1.5) {
                    status = 'WASPADA';
                    statusClass = 'status-waspada';
                    recommendation = 'Perlu Peningkatan Kesiapan Mental';
                    detailRecommendation = 'Hasil assessment menunjukkan bahwa Anda perlu meningkatkan beberapa aspek kesiapan mental. Disarankan untuk berkonsultasi dengan konselor profesional guna mengidentifikasi dan memperbaiki area yang perlu diperkuat. Fokus pada pembelajaran teknik manajemen stress dan pengembangan rencana tanggap darurat.';
                } else {
                    status = 'KRITIS';
                    statusClass = 'status-kritis';
                    recommendation = 'Memerlukan Bantuan Segera';
                    detailRecommendation = 'Hasil assessment menunjukkan kondisi mental Anda memerlukan perhatian khusus dan bantuan profesional. Sangat disarankan untuk segera berkonsultasi dengan konselor profesional untuk mendapatkan dukungan yang tepat. Jangan ragu untuk mencari bantuan dari komunitas dan keluarga dalam mempersiapkan diri menghadapi situasi darurat.';
                }

                // Update status and scores
                const statusBadge = document.getElementById('status-badge');
                statusBadge.textContent = status;
                statusBadge.className = `status-badge ${statusClass}`;

                document.getElementById('recommendation-title').textContent = recommendation;
                document.getElementById('overall-score').textContent = Math.round((averageScore/4) * 100) + '%';
                document.getElementById('answered-questions').textContent = totalQuestions;
                document.getElementById('sections-completed').textContent = data.sections ? data.sections.length : 0;
                document.getElementById('detailed-text').textContent = detailRecommendation;

                // Populate sections
                if (data.sections && data.sections.length > 0) {
                    populateSections(data.sections, answers);
                }

            } catch (error) {
                console.error('Error populating report:', error);
                document.body.innerHTML = '<div style="text-align: center; padding: 50px; color: #dc2626;"><h2>Terjadi kesalahan saat memuat laporan</h2><p>Silakan coba lagi.</p></div>';
            }
        }

        function populateSections(sections, answers) {
            const container = document.getElementById('sections-container');
            container.innerHTML = '';

            sections.forEach((section, sectionIndex) => {
                const sectionDiv = document.createElement('div');
                sectionDiv.className = 'section';

                const sectionHeader = document.createElement('div');
                sectionHeader.className = 'section-header';
                sectionHeader.textContent = `${sectionIndex + 1}. ${section.title}`;

                const sectionContent = document.createElement('div');
                sectionContent.className = 'section-content';

                const sectionDesc = document.createElement('p');
                sectionDesc.style.cssText = 'margin-bottom: 15px; color: #6b7280; font-style: italic; font-size: 13px;';
                sectionDesc.textContent = section.description;
                sectionContent.appendChild(sectionDesc);

                section.questions.forEach((question, questionIndex) => {
                    const questionDiv = document.createElement('div');
                    questionDiv.className = 'question';

                    const questionText = document.createElement('div');
                    questionText.className = 'question-text';
                    questionText.textContent = `${questionIndex + 1}. ${question.text}`;

                    const answerDiv = document.createElement('div');
                    answerDiv.className = 'answer';

                    const userAnswer = answers[question.id];
                    const selectedOption = question.options.find(opt => opt.value === userAnswer);

                    if (selectedOption) {
                        answerDiv.textContent = `✓ ${selectedOption.text} (Nilai: ${selectedOption.value}/4)`;
                    } else {
                        answerDiv.textContent = 'Tidak dijawab';
                        answerDiv.style.cssText = 'border-left-color: #dc2626; color: #dc2626;';
                    }

                    questionDiv.appendChild(questionText);
                    questionDiv.appendChild(answerDiv);
                    sectionContent.appendChild(questionDiv);
                });

                sectionDiv.appendChild(sectionHeader);
                sectionDiv.appendChild(sectionContent);
                container.appendChild(sectionDiv);
            });
        }
    </script>
</body>
</html>
