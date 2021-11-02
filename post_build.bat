%1

robocopy bin "C:\xampp\htdocs\localhost\php\mail" * /E 
set BINDIR=%cd%\bin\


if "%1"=="debug" goto :end

"C:\_mesProgs\WinSCP\WinSCP.com" ^
  /log="%cd%\WinSCP.log" /ini=nul ^
  /command ^
    "open sftp://qook:uU155cy54IGQf0M4Jek6@10.192.14.13/ -hostkey=""ssh-rsa 2048 nqlUJZBRZk4+gCB8pRNrGcXJrx13iKLTftGfrXlqvk4=""" ^
    "lcd %BINDIR%" ^
    "cd /home/qook/app/entry_point_qook/commonlibs/xapi/" ^
    "put -nopreservetime *" ^
    "exit"
	

:end


"C:\_mesProgs\WinSCP\WinSCP.com" ^
  /log="%cd%\WinSCP.log" /ini=nul ^
  /command ^
    "open sftp://qook:uU155cy54IGQf0M4Jek6@10.193.14.13/ -hostkey=""ssh-rsa 2048 wS00k9P56QO60lm1NS8bO+nPtjNA0htnzu/XzCyhfQg=""" ^
    "lcd %BINDIR%" ^
    "cd /home/qook/app/qook/commonlibs/xapi/" ^
    "put -nopreservetime *" ^
    "exit"
