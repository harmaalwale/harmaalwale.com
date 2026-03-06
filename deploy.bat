@echo off
echo ==========================================
echo   HarmaalWale Deploy Script
echo ==========================================
echo.

:: Ask for commit message
set /p MSG="What did you change? "
if "%MSG%"=="" set MSG=Update

:: ==========================================
:: STEP 1 - Push to GitHub
:: ==========================================
echo.
echo [1/2] Pushing to GitHub...
git add -A
git commit -m "%MSG%"
git push origin HEAD:main --force
echo GitHub done!

:: ==========================================
:: STEP 2 - Deploy directly to cPanel via SSH
:: ==========================================
echo.
echo [2/2] Deploying to harmaalwale.com via SSH...

ssh -i "%USERPROFILE%\.ssh\id_rsa" ^
    -o StrictHostKeyChecking=no ^
    -o KexAlgorithms=+diffie-hellman-group-exchange-sha256 ^
    -o HostKeyAlgorithms=+ssh-rsa ^
    -o PubkeyAcceptedAlgorithms=+ssh-rsa ^
    -o ServerAliveInterval=30 ^
    harmakko@192.185.129.210 ^
    "cd /home1/harmakko/repositories/harmaalwale.com && git fetch origin && git reset --hard origin/main && rsync -av --exclude='.git' --exclude='.github' --exclude='PS/var/cache' --exclude='*.rar' --exclude='*.7z' --exclude='deploy.bat' --exclude='.cpanel.yml' . /home1/harmakko/public_html/ && echo Deployed at $(date)"

echo.
echo ==========================================
echo  Deployed to GitHub + harmaalwale.com!
echo ==========================================
pause
