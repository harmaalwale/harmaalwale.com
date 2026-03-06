@echo off
echo Setting up SSH config for harmaalwale.com...

set CONFIG=%USERPROFILE%\.ssh\config

:: Backup existing config if present
if exist "%CONFIG%" (
    copy "%CONFIG%" "%CONFIG%.backup" >nul
    echo Backed up existing config to config.backup
)

:: Append harmaalwale host config
echo.>> "%CONFIG%"
echo Host harmaalwale.com>> "%CONFIG%"
echo     HostName harmaalwale.com>> "%CONFIG%"
echo     User harmakko>> "%CONFIG%"
echo     Port 22>> "%CONFIG%"
echo     IdentityFile ~/.ssh/harmaalwale_deploy>> "%CONFIG%"
echo     KexAlgorithms +diffie-hellman-group-exchange-sha256>> "%CONFIG%"
echo     HostKeyAlgorithms +ssh-rsa>> "%CONFIG%"
echo     PubkeyAcceptedKeyTypes +ssh-rsa>> "%CONFIG%"
echo     StrictHostKeyChecking no>> "%CONFIG%"
echo     ConnectTimeout 30>> "%CONFIG%"

echo.
echo Done! SSH config updated.
echo.
echo Testing connection...
ssh harmaalwale.com "echo SSH_CONFIG_WORKS"
pause
