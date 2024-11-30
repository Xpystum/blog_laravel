
###Команда git: Подтянуть все ветки из удалённого репозитория
```
git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
git fetch --all
git pull --all
```
[2024-11-30 19:51:59] local.ERROR: Произошла ошибка: {"0":"Ошибка при создании EmailAccesToken в CreateEmailAccesTokenAction","message":"Call to undefined function App\\Modules\\Notification\\Helpers\\uuid()","file":"C:\\Users\\Byfet\\Desktop\\blog_laravel_22_08_2024\\app\\Modules\\Base\\Traits\\HasUuid.php","line":16,"trace":{"Illuminate\\Support\\Collection":[{"file":"C:\\Users\\Byfet\\Desktop\\blog_laravel_22_08_2024\\vendor\\laravel\\framework\\src\\Illuminate\\Events\\Dispatcher.php","line":458,"function":"App\\Modules\\Base\\Traits\\{closure}","class":"App\\Modules\\Email\\Domain\\Models\\EmailAccesToken","type":"::","args":[{"value":"lgpxo@laoh.com","user_id":2}]}]}} 
[2024-11-30 19:51:59] local.ERROR: Произошла ошибка: {"message":"Ошибка при создании EmailAccesToken в CreateEmailAccesTokenAction","file":"C:\\Users\\Byfet\\Desktop\\blog_laravel_22_08_2024\\app\\Modules\\Email\\Domain\\Actions\\CreateEmailAccesTokenAction.php","line":35,"trace":{"Illuminate\\Support\\Collection":[{"file":"C:\\Users\\Byfet\\Desktop\\blog_laravel_22_08_2024\\app\\Modules\\Email\\Domain\\Actions\\CreateEmailAccesTokenAction.php","line":19,"function":"run","class":"App\\Modules\\Email\\Domain\\Actions\\CreateEmailAccesTokenAction","type":"->","args":[2,"lgpxo@laoh.com"]}]}} 
[2024-11-30 19:51:59] local.ERROR: Ошибка в UserRegistrationInteractor. {"exception":"[object] (Exception(code: 500): Ошибка в UserRegistrationInteractor. at C:\\Users\\Byfet\\Desktop\\blog_laravel_22_08_2024\\app\\Modules\\User\\Domain\\Interactor\\User\\UserRegistrationInteractor.php:46)
[stacktrace]
