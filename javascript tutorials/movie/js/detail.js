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
        var background_img = json.backdrop_path;
        var movieid = json.id;
        var title = json.title;
        var poster_path = json.poster_path;
        var r_date = json.release_date;
        r_year = r_date.slice(0, 4);
        var m_overview = json.overview;
        var cust_bg_url = json.backdrop_path;

        var movie_data = document.getElementById('movie_data');
        var section = document.createElement('section');
        section.setAttribute('class', 'inner_content movie_content backdrop poster');

        var header_div = document.createElement('div');
        header_div.setAttribute('class', 'header large border first lazyloaded');


        header_div.style.cssText = "position: absolute;left:0;right:0;width:100%;height: 69%;z-index:1;display:block;filter:contrast(130%);contrast(130%);margin-top: 171px;background-size: cover;background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;background-image: url(https://image.tmdb.org/t/p/w1400_and_h450_face" + cust_bg_url + ");will-change: opacity;transition: filter 1s;"
        var custon_bg = document.createElement('div');
        custon_bg.setAttribute('class', 'custom_bg');



        var single_colmn = document.createElement('div');
        single_colmn.setAttribute('class', 'single_column');

        var images_inner = document.createElement('section');
        images_inner.setAttribute('class', 'image inner');

        var poster = document.createElement('div');
        poster.setAttribute('class', 'poster');

        var image_content = document.createElement('div');
        image_content.setAttribute('class', 'image_content');

        var img_anchor = document.createElement('a');
        img_anchor.setAttribute('href', '#');
        img_anchor.setAttribute('class', 'no_click progressive');
        var img_url1 = 'https://image.tmdb.org/t/p/w300_and_h450_bestv2' + poster_path;
        var img_url2 = 'https://image.tmdb.org/t/p/w600_and_h900_bestv2' + poster_path;

        var img = document.createElement('img');
        // img.setAttribute('srcset',img_url1+','+img_url2)
        img.setAttribute('sizes', 'auto');
        img.setAttribute('src', img_url1);
        img.setAttribute('class', '');
        img.setAttribute('alt', title);


        //append
        img_anchor.append(img);
        image_content.append(img_anchor);
        poster.append(image_content);
        images_inner.append(poster);
        single_colmn.append(images_inner);
        custon_bg.append(single_colmn);
        header_div.append(custon_bg);
        section.append(header_div);

        //
        var poster_wrapper = document.createElement('div');
        poster_wrapper.setAttribute('class', 'header_poster_wrapper');

        var section_header = document.createElement('section');
        section_header.setAttribute('class', 'header poster');

        var title_img = document.createElement('div');
        title_img.setAttribute('class', 'title');
        title_img.setAttribute('dir', 'auto');

        var title_span = document.createElement('span');
        var title_anchor = document.createElement("a");
        title_anchor.setAttribute('href', this_url + '?id=' + id);

        var h2_title = document.createElement('h2');
        h2_title.innerHTML = title;

        var release_date = document.createElement('span');
        release_date.setAttribute('class', 'release_date ');
        release_date.innerHTML = '(' + r_year + ')';


        //append
        h2_title.append(release_date);
        title_anchor.append(h2_title);
        title_span.append(title_anchor);
        title_span.append(release_date);
        title_img.append(title_span);
        section_header.append(title_img);
        poster_wrapper.append(section_header);
        //

        var header_info = document.createElement('div');
        header_info.setAttribute('class', 'header_info');

        var info_h3 = document.createElement('h3');
        info_h3.setAttribute('dir', 'auto');
        info_h3.innerHTML = 'Overview';

        var overview = document.createElement('div');
        overview.setAttribute('class', 'overview');
        overview.setAttribute('dir', 'auto');
        var overview_p = document.createElement('p');
        overview_p.innerHTML = m_overview;

        var h3_featured = document.createElement('h3');
        h3_featured.setAttribute('class', 'featured');
        h3_featured.setAttribute('dir', 'auto');
        h3_featured.innerHTML = 'Featured Crew';

        var ol = document.createElement('ol');
        ol.setAttribute('class', 'people no_image');

        var ol_li = document.createElement('li');
        ol_li.setAttribute('class', 'profile');

        var profile_p = document.createElement('p');
        var p_anchor = document.createElement('a');
        p_anchor.setAttribute('href', '');
        p_anchor.innerHTML = 'directore name';
        var p_char = document.createElement('p');
        p_char.setAttribute('class', 'character');
        p_char.innerHTML = 'Director';

        profile_p.appendChild(p_anchor);
        ol_li.appendChild(profile_p);
        ol_li.appendChild(p_char);
        ol.appendChild(ol_li);

        var ol_li2 = document.createElement('li');
        ol_li2.setAttribute('class', 'profile');
        var profile_p2 = document.createElement('p');
        var p_anchor2 = document.createElement('a');
        p_anchor2.setAttribute('href', '');
        p_anchor2.innerHTML = 'screenplay name';
        var p_char2 = document.createElement('p');
        p_char2.setAttribute('class', 'character');
        p_char2.innerHTML = 'screen_play';

        profile_p2.appendChild(p_anchor2);
        ol_li2.appendChild(profile_p2);
        ol_li2.appendChild(p_char2);
        ol.appendChild(ol_li2);

        overview.append(overview_p);
        header_info.appendChild(info_h3);
        header_info.appendChild(overview);
        header_info.appendChild(h3_featured);
        header_info.appendChild(ol);

        section_header.append(header_info);
        poster_wrapper.section_header;
        images_inner.appendChild(poster_wrapper);
        single_colmn.append(images_inner);
        custon_bg.append(single_colmn);
        header_div.append(custon_bg);
        section.appendChild(header_div);

        var x = document.getElementById('movie_data');
        x.append(section);

        // var xx = document.getElementById('main');
        // xx.appendChild(x) ;

        // var w = document.getElementById('w');



    }
}
url = baseurl + '/movie/' + id + '?api_key=' + key + '&language=en-US';


xhttp.open("GET", url, true);
xhttp.send("Your JSON Data Here");

function cast() {
    var xx = new XMLHttpRequest();
    xx.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var js = JSON.parse(xx.responseText);
            var res = js.cast;
            console.log(res);
            var people_url = 'https://image.tmdb.org/t/p/w300_and_h450_bestv2';
            var people = document.getElementById('people');
            for (var i = 0; i < 6; i++) {
                for (var name in res[i]) {
                    var url = "https://www.themoviedb.org";
                    var id = res[i].cast_id;
                    var char = res[i].character;
                    var name = res[i].name;
                    var profile = res[i].profile_path;
                }
                var li = document.createElement('li');
                li.setAttribute('class', 'card');

                var name_a = document.createElement('a');
                name_a.setAttribute('href', people_url + profile);

                var img = document.createElement('img');
                img.setAttribute('class', 'profile fade lazyautosizes lazyloaded');
                img.setAttribute('src', people_url + profile);

                name_a.append(img);
                var p_name = document.createElement('p');


                var p_a = document.createElement('a');
                p_a.setAttribute('href', id + '-' + name);
                p_a.innerHTML = name;

                p_name.append(p_a);
                var char = document.createElement('p');
                char.setAttribute('class', 'character');
                char.innerHTML = name;
                li.append(name_a);
                li.append(p_name);
                li.append(char);
                
                people.append(li);
                console.log(people);
            }




        }

    }
    var x = baseurl + '/movie/' + id + '/credits?api_key=' + key;

    xx.open('GET', x, true);
    xx.send('data');

}