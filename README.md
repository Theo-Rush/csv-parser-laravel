// basic commands used here
php artisan make:Controller CsvControlller --resource
php artisan make:model MockUser -m
php artisan make:model Category -m 
php artisan make:model Csv
php artisan make:model CsvFilter

// explanation of what's in here
Відправні точки реалізації
    1.1 Перший рядок CSV містить назви полів
    1.2 Кожний наступний рядок датасету містить дані про дві сутності у базі
    1.3 Оскільки пошта - єдине наявне поле у файлі, котре дозволяє більш-менш стабільно ідентифікувати користувача, у відповідній міграції створено індекс для поля email, а перед парсингом здійснюється низка перевірок цілісності даних:
        --- структура рядків має бути однаковою. Відсутність/зайвість поля унеможливлює логічний парсинг датасету, тому такий рядок позначається помилковим, що зупиняє подальший парсинг задля виправлення даних/вилучення рядка з датасету
        --- перевірка валідності дати спричинена обмеженнями бази і не може бути пропущена
        --- перевірка валідності email'ів теоретично може бути надлишковою, проте це загальна практика
        --- перевірка унікальності email'ів покращує зв'язність даних і дозволяє відкинути «сміття»
    1.4 п. 1.3 означає, що не завжди є доцільним завантажувати датасет. У такому разі парсер видає список рядків, які не пройшли перевірку.
    1.5 Файл експорту враховує усі сторінки видачі за поточним фільтром і не зберігається всередині системі

Starting points
    1.1 CSV's first line contains headers
    1.2 Each next line of the dataset contains data for two DB entities
    1.3 Since email is the only field present that allows to identify a user more or less stably, a correspondent migration has an index for email and a series of data integrity check precedes parsing:
        --- the structure of a line must be the same. Lacking/extrs fields make it impossible to parse the dataset logically, therefore such a line is marked erroneous which is to stop fyrther parsing in order to fix/exclude data from dataset
        --- date validity check is caused by DB limitations and mustn't be skipped
        --- email validity check could be redundant (in theory) but it is a common practice
        --- email uniqueness check enhances data cohesion and allows to leave out "garbage"
    1.4 1.3 means it isn't always reasonable to upload a dataset. So service will catalogue the lines that failed the checks
    1.5 Export file is to consider all the pages filtered and is not kept within the system