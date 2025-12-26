<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi Berakhir - KosaBangsa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 100%;
            padding: 40px;
            text-align: center;
        }
        
        .icon {
            font-size: 80px;
            margin-bottom: 20px;
        }
        
        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        
        .btn {
            display: inline-block;
            padding: 14px 28px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-secondary {
            background: #f3f4f6;
            color: #374151;
        }
        
        .btn-secondary:hover {
            background: #e5e7eb;
            transform: translateY(-2px);
        }
        
        @media (min-width: 640px) {
            .buttons {
                flex-direction: row;
            }
            
            .btn {
                width: auto;
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">⏱️</div>
        <h1>Sesi Berakhir</h1>
        <p>
            Sesi Anda telah berakhir karena tidak ada aktivitas dalam beberapa saat. 
            Silakan login kembali untuk melanjutkan.
        </p>
        <div class="buttons">
            <a href="{{ route('login') }}" class="btn btn-primary">
                🔐 Login Kembali
            </a>
            <a href="{{ route('home') }}" class="btn btn-secondary">
                🏠 Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>

