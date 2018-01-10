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
  
  Folders:
    live2016 - contains most of the code from the 2016 convention site. Feel free to take pieces from here as needed.
    p1_static - code for the static mockup. There are some html/css/js folders but feel free to use  whatever organization works best
    p2_react - Starting point for creating React components (contains a basic webpack configuration, index.html to attach react components to, and a folder of components). Has babel so feel free to use ES6 as well
    p3_backend - Laravel backend (php). We'll port over the above parts to laravel once done.
