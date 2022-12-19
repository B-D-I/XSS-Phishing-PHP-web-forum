
Vulnerable forum application to demonstrate XSS-Phishing. 

JavaScript can be submitted into forum ->
![image](https://user-images.githubusercontent.com/85758021/208474103-22db3a5b-5c16-49be-adf4-c6d7133d16e0.png)

Users are then redirected to a fake login page, where credentials are stolen ->
![image](https://user-images.githubusercontent.com/85758021/208474318-9fd97509-ce7e-4874-b743-a7d6e161a4f5.png)

Attack can be mitigated by converting user input into HTML entities, using htmlspecialchars() ->
![image](https://user-images.githubusercontent.com/85758021/208474553-763b96c5-fe66-43ac-a35a-6cba20eac2e2.png)
