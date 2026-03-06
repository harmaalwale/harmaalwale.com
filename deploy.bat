@echo off
echo.
echo  ==========================================
echo   HarmaalWale — Deploy
echo  ==========================================
echo.

cd /d %~dp0

set /p MSG="Commit message (or Enter for 'update'): "
if "%MSG%"=="" set MSG=update

echo.
echo  [1/2] Pushing to GitHub...
git add .
git commit -m "%MSG%"
git push origin main

echo.
echo  [2/2] Deploying directly to server...
ssh -i "%USERPROFILE%\.ssh\harmaalwale_deploy" -o KexAlgorithms=+diffie-hellman-group-exchange-sha256 -o HostKeyAlgorithms=+ssh-rsa -o PubkeyAcceptedKeyTypes=+ssh-rsa -o StrictHostKeyChecking=no harmakko@harmaalwale.com "cd /home1/harmakko/repositories/harmaalwale.com && git pull origin main && rsync -a --exclude='.git' --exclude='.github' --exclude='.cpanel.yml' --exclude='README.md' --exclude='deploy.bat' /home1/harmakko/repositories/harmaalwale.com/ /home1/harmakko/public_html/ && echo DEPLOYED"

echo.
echo  ==========================================
echo   Live NOW: https://harmaalwale.com
echo  ==========================================
echo.
pause
