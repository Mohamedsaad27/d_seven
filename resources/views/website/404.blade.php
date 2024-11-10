<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - D-Seven Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --d-seven-navy: #1B263B;
            --d-seven-light: #F5F7FA;
        }
        
        .error-container {
            min-height: 100vh;
            background-color: var(--d-seven-light);
            display: flex;
            align-items: center;
        }
        
        .error-content {
            text-align: center;
            padding: 2rem;
        }
        
        .logo-container {
            margin-bottom: 2rem;
        }
        
        .logo-container svg {
            width: 200px;
            height: auto;
        }
        
        .error-code {
            font-size: 120px;
            font-weight: bold;
            color: var(--d-seven-navy);
            line-height: 1;
            font-family: 'Arial', sans-serif;
        }
        
        .kitchenware-icon {
            font-size: 64px;
            margin: 20px 0;
            color: var(--d-seven-navy);
        }
        
        .error-message {
            font-size: 24px;
            color: var(--d-seven-navy);
            margin: 20px 0;
        }
        
        .suggestion-text {
            color: #666;
            margin-bottom: 30px;
        }
        
        .home-button {
            background-color: var(--d-seven-navy);
            border: none;
            padding: 12px 30px;
            font-size: 18px;
            transition: all 0.3s ease;
        }
        
        .home-button:hover {
            background-color: #2c3e50;
            transform: scale(1.05);
        }
        
        .search-container {
            max-width: 500px;
            margin: 20px auto;
        }
        
        .category-btn {
            border: 2px solid var(--d-seven-navy);
            color: var(--d-seven-navy);
        }
        
        .category-btn:hover {
            background-color: var(--d-seven-navy);
            color: white;
        }

        .kitchen-icon-row {
            margin: 30px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .kitchen-icon {
            width: 40px;
            height: 40px;
            fill: var(--d-seven-navy);
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="container">
            <div class="error-content">
                <div class="logo-container">
                    <svg viewBox="0 0 100 60" style="width: 200px; fill: var(--d-seven-navy);">
                        <path d="M10,30 a40,20 0 0,1 80,0 L90,30 L10,30 Z"/>
                        <g transform="translate(20,10)">
                            <rect x="0" y="0" width="15" height="12" rx="2"/>
                            <rect x="25" y="0" width="20" height="15" rx="2"/>
                            <rect x="55" y="5" width="15" height="2"/>
                            <circle cx="55" cy="10" r="3"/>
                        </g>
                    </svg>
                </div>
                
                <div class="error-code">404</div>
                <div class="kitchen-icon-row">
                    <svg class="kitchen-icon" viewBox="0 0 24 24">
                        <path d="M3,6V11H21V6A3,3 0 0,0 18,3H6A3,3 0 0,0 3,6Z"/>
                        <path d="M3,13V18A3,3 0 0,0 6,21H18A3,3 0 0,0 21,18V13H3Z"/>
                    </svg>
                    <svg class="kitchen-icon" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                    <svg class="kitchen-icon" viewBox="0 0 24 24">
                        <path d="M8.1,13.34L3.91,9.16C2.35,7.59 2.35,5.06 3.91,3.5L10.93,10.5L8.1,13.34M14.88,11.53L13.41,13L20.29,19.88L18.88,21.29L12,14.41L5.12,21.29L3.71,19.88L13.47,10.12C12.76,8.59 13.26,6.44 14.85,4.85C16.76,2.93 19.5,2.57 20.96,4.03C22.43,5.5 22.07,8.24 20.15,10.15C18.56,11.74 16.41,12.24 14.88,11.53Z"/>
                    </svg>
                </div>
                <h1 class="error-message">Oops! This Page is Missing</h1>
                <p class="suggestion-text">
                    Just like a misplaced cooking utensil, this page seems to have wandered off!
                </p>
                
              
                
                <p class="suggestion-text">
                    Browse our popular categories:
                </p>
                
                <div class="d-flex justify-content-center gap-3 mb-4">
                    <a href="#" class="btn category-btn">Cookware</a>
                    <a href="#" class="btn category-btn">Dinnerware</a>
                    <a href="#" class="btn category-btn">Kitchen Tools</a>
                </div>
                
                <a href="{{ route('index') }}" class="btn btn-primary home-button">
                    Return to Homepage
                </a>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>