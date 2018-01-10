# convention2018

```
$ git clone https://github.com/anishpdoshi/convention2018.git
$ cd convention2018
```

Prerequisites:
P1 - None! You can create HTML/CSS/JS files locally, and simply view the results in your browser.

P2 - 

  1) install Node.js + NPM
    Mac: 
      1) get homebrew: https://brew.sh/
      2) install node
      ```
      $ brew update
      $ brew install nvm
      $ nvm install node
      $ nvm use node
      ```
    Windows: https://wsvincent.com/install-node-js-npm-windows/

  2) install webpack
  ```
  $ npm install -g webpack
  ```
  3) install dependencies
  ```
  $ cd p2_react
  $ npm install
  ```
  4) TO develop - cd into p2_react, run ```node run dev-server```, and then you should be able to view your app on localhost:8080. Changes you make to files will automatically be refreshed in the page.
