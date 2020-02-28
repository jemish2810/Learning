var baseurl = 'https://api.themoviedb.org/3';
const key = '38252124dbbb11a893376bd6da75d318';
var xhttp = new XMLHttpRequest();
var count = 0;
function loadmore() {
    count++;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(xhttp.responseText);
            var results = json.results;
            total_pages = json.total_pages;
            page_this = json.page;

            for (var i = 0; i < results.length; i++) {
                for (var name in results[i]) {
                    var url = "https://www.themoviedb.org";
                    var id = results[i].id;
                    var title = results[i].title;
                    var poster_path = results[i].poster_path;
                    var release_date = results[i].release_date;
                    var overview = results[i].overview;

                }
                var x = 'http://localhost/Jemish/javascript tutorials/movie/detail.php';

                var clone = document.getElementById('clone');
                var card = document.createElement("div");
                card.setAttribute('class', "item poster card");
                var image_content = document.createElement("div");
                image_content.setAttribute("class", "image_content");

                var img_a = document.createElement("a");
                img_a.setAttribute("id", "movie_" + id);
                img_a.setAttribute("class", "result");
                img_a.setAttribute("href", x +"?id=" + id);
                img_a.setAttribute("title", title);
                img_a.setAttribute("alt", "title");
                img_a.setAttribute("class", "result");
                var img_url = "https://image.tmdb.org/t/p/w185_and_h278_bestv2";
                var img_url2 = " https://image.tmdb.org/t/p/w185_and_h278_bestv2";
                var img_url3 = "https://image.tmdb.org/t/p/w370_and_h556_bestv2";


                var poster_img = document.createElement("img");
                poster_img.setAttribute("class", "poster fade lazyautosizes lazyloaded");
                poster_img.setAttribute("data-sizes", "auto");
                poster_img.setAttribute("data-src", img_url + poster_path);
                poster_img.setAttribute("data-srcset", img_url2 + poster_path + "1x" + "," + img_url3 + poster_path + "2x");
                poster_img.setAttribute("src", img_url + poster_path);


                var info = document.createElement("div");
                info.setAttribute("class", "info");

                var wrapper = document.createElement("div");
                wrapper.setAttribute("class", "wrapper");

                var flex = document.createElement("div");
                flex.setAttribute("class", "flex");
                var title_result = document.createElement("a");
                title_result.setAttribute("class", "title result");
                title_result.setAttribute("id", "movie_" + id);
                title_result.setAttribute("href",  x+"php/movie/" + id);
                title_result.setAttribute("title", title);
                title_result.setAttribute("alt", title);
                title_result.innerHTML = title;

                var date_span = document.createElement("span");
                date_span.innerHTML = release_date;

                var overview_p = document.createElement("p");
                overview_p.setAttribute("class", "overview");
                overview_p.innerHTML = overview;

                var view_more = document.createElement("p");
                view_more.setAttribute("class", "view_more");

                var view_more_a = document.createElement("a");
                view_more_a.setAttribute("id", "movie_" + id);
                view_more_a.setAttribute("class", "result");
                view_more_a.setAttribute("href", url + "/movie/" + id);
                view_more_a.setAttribute("title", title);
                view_more_a.setAttribute("alt", title);
                view_more_a.innerHTML = "More info";

                card.append(image_content);
                image_content.append(img_a);
                img_a.append(poster_img);
                clone.append(card);
                card.append(info);
                info.append(wrapper);
                wrapper.append(flex);
                flex.append(title_result);
                title_result.append(date_span);
                info.append(overview_p);
                info.append(view_more);
                view_more.append(view_more_a);
            }
        };
    }
        url = baseurl + "/movie/popular?api_key=" + key + "&language=en-US&page=" + count;
        console.log(url);
        xhttp.open("GET", url, true);
        xhttp.send("Your JSON Data Here");
}

loadmore();