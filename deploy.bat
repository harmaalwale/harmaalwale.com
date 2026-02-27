@echo off
echo.
echo  ==========================================
echo   HarmaalWale — Auto Deploy to cPanel
echo  ==========================================
echo.

cd /d %~dp0

:: Get commit message
set /p MSG="Enter commit message (or press Enter for 'update'): "
if "%MSG%"=="" set MSG=update

echo.
echo  Pushing: %MSG%
echo.

git add .
git commit -m "%MSG%"
git push origin main

echo.
echo  ==========================================
echo   Done! Site will be live in ~20 seconds
echo   Check: https://harmaalwale.com
echo  ==========================================
echo.
pause
