<?php
require_once __DIR__ . '/config/database.php';

// === ABOUT ===
$pdo->exec("UPDATE about SET
    bio_uz = 'Men professional Full Stack web dasturchiman. 3 yildan ortiq tajribaga egaman. PHP, Python/Django, JavaScript va MySQL texnologiyalarida ishlayman. Zamonaviy, tez va xavfsiz web ilovalar yaratish boyicha mutaxassisiman. Suniy intellekt va machine learning sohasida ham tajribam bor.',
    bio_en = 'I am a professional Full Stack web developer with over 3 years of experience. I specialize in PHP, Python/Django, JavaScript and MySQL technologies. I create modern, fast and secure web applications. I also have experience in artificial intelligence and machine learning.',
    education_uz = 'TATU - Kompyuter muhandisligi (2021-2025)\nOnline kurslar: Udemy, Coursera, freeCodeCamp',
    education_en = 'TUIT - Computer Engineering (2021-2025)\nOnline courses: Udemy, Coursera, freeCodeCamp',
    experience_uz = 'Freelance Web Developer (2022-hozir)\nJunior Backend Developer - TechCompany (2023-2024)\nFull Stack Developer - StartupUZ (2024-hozir)',
    experience_en = 'Freelance Web Developer (2022-present)\nJunior Backend Developer - TechCompany (2023-2024)\nFull Stack Developer - StartupUZ (2024-present)'
    WHERE id = 1");
echo "About updated\n";

// === BLOGS ===
$blogs = [
    ['PHP 8.3 yangiliklari va yangi funksiyalar', 'PHP 8.3 New Features and Updates', 'php-8-3-new-features',
     'PHP 8.3 versiyasida qanday yangiliklar bor? Keling korib chiqamiz.', 'What is new in PHP 8.3? Let us explore the latest features.',
     'PHP 8.3 versiyasi koplab yangi funksiyalar va yaxshilanishlar bilan keldi. Typed class constants, json_validate() funksiyasi, Randomizer sinfiga yangi metodlar qoshildi. Bu versiya performance jihatdan ham sezilarli yaxshilangan. PHP dasturchilar uchun bu versiyaga otish juda muhim, chunki xavfsizlik va tezlik jihatdan katta qadam tashlangan.',
     'PHP 8.3 comes with many new features and improvements. Typed class constants, json_validate() function, new methods added to Randomizer class. This version has also significantly improved in terms of performance. It is very important for PHP developers to upgrade to this version as it takes a big step in terms of security and speed.'],
    ['Django vs Laravel: Qaysi biri yaxshiroq?', 'Django vs Laravel: Which One is Better?', 'django-vs-laravel',
     'Ikki mashhur framework solishtiruvi', 'A comparison of two popular frameworks',
     'Django va Laravel - ikkalasi ham backend development uchun eng mashhur frameworklar. Django Python tilida yozilgan bolib, batteries included falsafasiga amal qiladi. Laravel esa PHP da yozilgan va elegant syntax bilan ajralib turadi. Loyiha talablariga qarab tanlash kerak. Katta data loyihalar uchun Django, tez MVP yaratish uchun Laravel kooproq mos keladi.',
     'Django and Laravel are both the most popular frameworks for backend development. Django is written in Python and follows the batteries included philosophy. Laravel is written in PHP and stands out with its elegant syntax. You should choose based on project requirements. Django is more suitable for large data projects, while Laravel is better for quickly building MVPs.'],
    ['MySQL optimizatsiya sirlari', 'MySQL Optimization Secrets', 'mysql-optimization-secrets',
     'Malumotlar bazasini tezlashtirish usullari', 'Ways to speed up your database',
     'MySQL malumotlar bazasini optimizatsiya qilish har bir dasturchi uchun muhim konikma. Indekslardan togri foydalanish, query optimizatsiya, EXPLAIN dan foydalanish, cache strategiyalari va normalizatsiya - bular asosiy usullar. Shuningdek, slow query log ni monitoring qilish va N+1 muammosidan qochish kerak.',
     'Optimizing MySQL databases is an essential skill for every developer. Proper use of indexes, query optimization, using EXPLAIN, cache strategies and normalization are the main methods. Additionally, monitoring slow query logs and avoiding the N+1 problem is crucial.'],
    ['REST API yaratish: Best Practices', 'Building REST APIs: Best Practices', 'rest-api-best-practices',
     'Professional API arxitektura qoidalari', 'Professional API architecture guidelines',
     'REST API yaratishda bir nechta muhim qoidalarga amal qilish kerak: togri HTTP metodlaridan foydalanish (GET, POST, PUT, DELETE), versioning, pagination, proper error handling, authentication (JWT/OAuth), rate limiting va dokumentatsiya. Bu qoidalar API ni professional va ishlatish oson qiladi.',
     'When building REST APIs, you should follow several important rules: proper use of HTTP methods (GET, POST, PUT, DELETE), versioning, pagination, proper error handling, authentication (JWT/OAuth), rate limiting and documentation. These rules make the API professional and easy to use.'],
    ['AI va Web Development kelajagi', 'AI and the Future of Web Development', 'ai-future-web-development',
     'Suniy intellekt web dasturlashni qanday ozgartirmoqda', 'How artificial intelligence is changing web development',
     'Suniy intellekt web development sohasini tubdan ozgartirmoqda. GitHub Copilot, ChatGPT va boshqa AI vositalar kod yozish jarayonini tezlashtirmoqda. AI-powered chatbotlar, recommendation systemlar va personalization - bular zamonaviy web ilovalarning ajralmas qismi bolib qolmoqda. Kelajakda AI bilan birga ishlash konikmalari eng muhim skill boladi.',
     'Artificial intelligence is fundamentally changing the field of web development. GitHub Copilot, ChatGPT and other AI tools are speeding up the coding process. AI-powered chatbots, recommendation systems and personalization are becoming integral parts of modern web applications. In the future, the ability to work with AI will be the most important skill.'],
    ['Git va GitHub: Professional workflow', 'Git and GitHub: Professional Workflow', 'git-github-professional-workflow',
     'Jamoada ishlash uchun Git strategiyalari', 'Git strategies for team collaboration',
     'Professional dasturchilar Git dan samarali foydalanishlari kerak. Git Flow, GitHub Flow, trunk-based development - bular asosiy branching strategiyalar. Pull request, code review, CI/CD pipeline va semantic versioning - bular jamoada ishlashning muhim qismlari. Har bir commit manoli va kichik bolishi kerak.',
     'Professional developers need to use Git effectively. Git Flow, GitHub Flow, trunk-based development are the main branching strategies. Pull requests, code reviews, CI/CD pipelines and semantic versioning are important parts of team collaboration. Each commit should be meaningful and small.'],
];

$stmt = $pdo->prepare('INSERT INTO blogs (title_uz, title_en, slug, short_desc_uz, short_desc_en, content_uz, content_en, is_published) VALUES (?,?,?,?,?,?,?,1)');
foreach ($blogs as $b) { $stmt->execute($b); }
echo count($blogs) . " blogs inserted\n";

// === PROJECTS ===
$projects = [
    ['E-commerce platforma', 'E-commerce Platform', 'e-commerce-platform',
     'Toliq funksional onlayn dokon. Foydalanuvchi royxatdan otishi, mahsulotlarni korishi, savatga qoshishi va tolov qilishi mumkin.',
     'Fully functional online store. Users can register, browse products, add to cart and make payments.',
     'PHP, MySQL, JavaScript, Bootstrap, Stripe API', 'https://github.com/username/ecommerce', '', 1],
    ['Task Manager App', 'Task Manager App', 'task-manager-app',
     'Jamoalar uchun vazifalarni boshqarish tizimi. Drag-and-drop, real-time yangilanishlar va hisobotlar.',
     'Task management system for teams. Drag-and-drop, real-time updates and reports.',
     'Django, PostgreSQL, React, WebSocket', 'https://github.com/username/taskmanager', '', 1],
    ['Blog CMS', 'Blog CMS', 'blog-cms',
     'Kontent boshqaruv tizimi. WYSIWYG editor, media boshqaruvi, SEO optimizatsiya va kop tilli qollab-quvvatlash.',
     'Content management system. WYSIWYG editor, media management, SEO optimization and multi-language support.',
     'PHP, Laravel, MySQL, Vue.js', 'https://github.com/username/blogcms', '', 1],
    ['Weather Dashboard', 'Weather Dashboard', 'weather-dashboard',
     'Ob-havo malumotlarini real-time korsatadigan dashboard. Grafik va diagrammalar bilan.',
     'Real-time weather data dashboard with charts and diagrams.',
     'Python, Flask, OpenWeatherMap API, Chart.js', 'https://github.com/username/weather', '', 0],
    ['Portfolio Website', 'Portfolio Website', 'portfolio-website',
     'Professional portfolio sayti. Kop tilli, admin panel va responsive dizayn bilan.',
     'Professional portfolio website with multi-language, admin panel and responsive design.',
     'PHP, MySQL, JavaScript, CSS3', 'https://github.com/username/portfolio', '', 1],
    ['AI Chatbot', 'AI Chatbot', 'ai-chatbot',
     'Suniy intellektga asoslangan chatbot. NLP texnologiyasi bilan savollarga javob beradi.',
     'AI-powered chatbot that answers questions using NLP technology.',
     'Python, TensorFlow, Flask, NLP', 'https://github.com/username/aichatbot', '', 1],
    ['Inventory System', 'Inventory Management System', 'inventory-system',
     'Ombor boshqaruv tizimi. Mahsulot kirim-chiqimi, hisobotlar va QR kod skaneri.',
     'Warehouse management system. Product tracking, reports and QR code scanner.',
     'PHP, MySQL, jQuery, Bootstrap', 'https://github.com/username/inventory', '', 0],
    ['Social Media API', 'Social Media API', 'social-media-api',
     'Ijtimoiy tarmoq uchun RESTful API. JWT autentifikatsiya, postlar, kommentlar va like tizimi.',
     'RESTful API for social network. JWT authentication, posts, comments and like system.',
     'Django REST Framework, PostgreSQL, Redis, Docker', 'https://github.com/username/socialapi', '', 1],
];

$stmt = $pdo->prepare('INSERT INTO projects (name_uz, name_en, slug, description_uz, description_en, technologies, github_link, live_link, is_featured) VALUES (?,?,?,?,?,?,?,?,?)');
foreach ($projects as $p) { $stmt->execute($p); }
echo count($projects) . " projects inserted\n";

// === CONTACTS ===
$contacts = [
    ['Aziz Karimov', 'aziz@gmail.com', 'Salom! Menga e-commerce sayt kerak. Narxi qancha boladi? Boglanishimiz mumkinmi?', 0],
    ['John Smith', 'john.smith@mail.com', 'Hi! I saw your portfolio and I am impressed. I need a web application for my startup. Can we discuss?', 0],
    ['Dilshod Toshmatov', 'dilshod@inbox.uz', 'Assalomu alaykum. Django boyicha konsultatsiya olsam boladimi? Loyihamda yordam kerak.', 1],
    ['Sarah Johnson', 'sarah.j@company.com', 'We are looking for a PHP developer for a 3-month contract. Your skills match our requirements perfectly.', 0],
    ['Bobur Aliyev', 'bobur.dev@gmail.com', 'Blog CMS loyihangiz juda yoqdi. Open source qilish rejangiz bormi? Contribute qilmoqchiman.', 1],
];

$stmt = $pdo->prepare('INSERT INTO contacts (name, email, message, is_read) VALUES (?,?,?,?)');
foreach ($contacts as $c) { $stmt->execute($c); }
echo count($contacts) . " contacts inserted\n";

echo "\nDone! Baza toldirildi.\n";
