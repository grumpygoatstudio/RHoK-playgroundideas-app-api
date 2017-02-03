# RHoK-playgroundideas-app-api


## Process
1. Unity WebGL opens in browser from Wordpress link, that includes user ID
  - Test version passes in querystring (https://docs.unity3d.com/ScriptReference/Application-absoluteURL.html)
  - TODO: secure this better?

2. Unity calls RESTful JSON API to get all the user data, designs, images etc

**Users:**
1. Get all users: /users/get.php
2. Get user with id x: /users/get.php?id={x}

**Playgrounds:**
1. Get all Playgrounds: /playgrounds/get.php
2. Get Playground with id x: /playgrounds/get.php?id={x}
3. Save Playground: /playgrounds/save.php
    *- Post vars: userId, name, screenshot (image file)*
    
**Images:**
1. Get Image: 
    *- /images/get.php*
    *-  Get vars: userId, designId, assetName (filename)*
2. Get All Images for a Playground: 
    *- /images/playground_get_all.php?id={x}*
    *- Get vars: userId, designId*
3. Save Playground: 
    *- /images/save.php*
    *- Post vars: userId, designId, image (file)*

## Installation Notes
1. Setting up the Database parameters configuration file:
    1. Open the sample configuration file 'config_example.php'
    2. Replace all values for the MySQL settings with those of your database.
    3. Save this file in the same folder, but re-named as 'config.php'.
