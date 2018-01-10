const express = require('express');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();

// Serve static files from the frontend build
app.use(express.static(path.join(__dirname, 'dist')));

app.use(bodyParser.urlencoded({
  extended: true
}));
app.use(bodyParser.json());

// The "catchall" handler: for any request that doesn't
// match one above, send back index.html file.
app.get('*', (req, res) => {
  res.sendFile(path.join(__dirname, '/dist/index.html'));
});

const port = process.env.PORT || 5000;
app.listen(port);