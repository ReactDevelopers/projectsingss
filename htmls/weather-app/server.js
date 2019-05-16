const express = require('express')
const bodyParser = require('body-parser');
const app = express()

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));
app.set('view engine', 'ejs')

app.get('/', function (req, res) {
  // res.send('Hello World!')
  res.render('index');
})

app.post('/check', function (req, res) {
  // res.send('Hello World!')
  res.render('index', { posts: JSON.parse(req.body.city) });
  console.log(req.body.city);
})

app.listen(3000, function () {
  console.log('Example app listening on port 3000!')
})	