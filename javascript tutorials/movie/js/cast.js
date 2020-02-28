var baseurl = ' https://api.themoviedb.org/3';
const key = '38252124dbbb11a893376bd6da75d318';
var xhttp = new XMLHttpRequest();
const queryString = window.location.href;
var x = queryString;
var id = x.slice(67, 73);
var this_url = 'http://localhost/Jemish/javascript%20tutorials/movie/detail.php';
xhttp.onreadystatechange = function () {

    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(xhttp.responseText);
        // var background_img = json.backdrop_path;
        // var movieid = json.id;
        // var title = json.title;
        // var poster_path = json.poster_path;
        // var r_date = json.release_date;
        // r_year = r_date.slice(0, 4);
        // var m_overview = json.overview;
        // var cust_bg_url = json.backdrop_path;
console.log(json);
   
}
url = baseurl + '/movie/' + id + '/credits?api_key=' + key;


xhttp.open("GET", url, true);
xhttp.send("Your JSON Data Here");

