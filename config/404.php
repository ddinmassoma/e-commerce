<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>404 - Page introuvable | TechStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .container {
            max-width: 600px;
            padding: 20px;
        }

        h1 {
            font-size: 120px;
            color: #3b82f6;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 15px;
        }

        p {
            color: #cbd5f5;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #2563eb;
        }

        .icon {
            font-size: 50px;
            margin-bottom: 20px;
        }

        footer {
            position: absolute;
            bottom: 15px;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="icon">💻</div>
        <h1>404</h1>
        <h2>Oups… page introuvable</h2>
        <p>
            La page que vous recherchez n'existe pas ou a été déplacée.<br>
            Continuez votre navigation sur TechStore pour trouver vos produits informatiques.
        </p>

        <a href="/" class="btn">Retour à l'accueil</a>
    </div>

    <footer>
        © 2026 TechStore - Tous droits réservés
    </footer>

</body>
</html>