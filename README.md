#  Stigmatized

###  A messenger bot to help sexually assaulted individuals.

### *Build the server*

1. Install the Heroku toolbelt from here https://toolbelt.heroku.com to launch, stop and monitor instances. Sign up for free at https://www.heroku.com if you don't have an account yet.

2. Install Node from here https://nodejs.org, this will be the server environment. Then open up Terminal or Command Line Prompt and make sure you've got the very most recent version of npm by installing it again:

    ```
    sudo npm install npm -g
    ```

3. Create a new folder somewhere and let's create a new Node project. Hit Enter to accept the defaults.

    ```
    npm init
    ```

4. Install the additional Node dependencies. Express is for the server, request is for sending out messages and body-parser is to process messages.

    ```
    npm install express request body-parser --save
    ```
5. Commit all the code with Git then create a new Heroku instance and push the code to the cloud.

    ```
    git init
    git add .
    git commit --message "hello world"
    heroku create
    git push heroku master
    ```
## Quickstart

Run in your terminal:

```bash
# Node.js <= 6.x.x, add the flag --harmony_destructuring
node --harmony_destructuring startup/stigmatized.js <MY_TOKEN>
# Node.js >= v6.x.x
node startup/stigmatized.js <MY_TOKEN>
```
