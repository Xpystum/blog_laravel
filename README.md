
###Команда git: Подтянуть все ветки из удалённого репозитория
```
git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
git fetch --all
git pull --all
```
