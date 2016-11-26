# RHoK-playgroundideas-app-api


## Process
1. Unity WebGL opens in browser from Wordpress link, that includes user ID
  - Test version passes in querystring (https://docs.unity3d.com/ScriptReference/Application-absoluteURL.html)
  - TODO: secure this better?

2. Unity calls RESTful JSON API to get all the user data, designs, images etc
  - Get all users: /users/get.php
  - Get user with id x: /users/get.php?id={x} 