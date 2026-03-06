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
    harmakko@192.185.129.210 ^
    "git config --global user.email 'deploy@harmaalwale.com' && git config --global user.name 'Deploy' && cd /home1/harmakko/repositories/harmaalwale.com && git pull origin main && cp -rf . /home1/harmakko/public_html/ && rm -rf /home1/harmakko/public_html/.git /home1/harmakko/public_html/.github && rm -f /home1/harmakko/public_html/deploy.bat /home1/harmakko/public_html/.cpanel.yml && echo DONE"

echo.
echo ==========================================
echo  Deployed to GitHub + harmaalwale.com!
echo ==========================================
pause
