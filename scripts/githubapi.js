function github() {
    var request = new XMLHttpRequest()

    request.open('GET', 'https://api.github.com/users/d1ng0ls' , true)

    request.onload = function() {
        var data = JSON.parse(this.response);
        
        var name = data.name;
        var bio = data.bio;
        var img = data.avatar_url;

        if (!bio) {
            document.getElementById('bio1').innerHTML = '<p></p>';
        } else {
            document.getElementById('bio1').innerHTML = '<p>"' + bio + '"</p>';
        }

        document.getElementById('name1').innerHTML = '<h2>' + name + '</h2>';
        document.getElementById('img1').innerHTML = '<img src="'+img+'">'
    }

    request.send();
}

function github2() {
    var request = new XMLHttpRequest()

    request.open('GET', 'https://api.github.com/users/carlosxsu', true)

    request.onload = function() {
        var data = JSON.parse(this.response);
        
        var name = data.name;
        var bio = data.bio;
        var img = data.avatar_url;

        if (!bio) {
            document.getElementById('bio2').innerHTML = '<p></p>';
        } else {
            document.getElementById('bio2').innerHTML = '<p>"' + bio + '"</p>';
        }

        document.getElementById('name2').innerHTML = '<h2>' + name + '</h2>';
        document.getElementById('img2').innerHTML = '<img src="'+img+'">'
    }

    request.send();
}

function github3() {
    var request = new XMLHttpRequest()

    request.open('GET', 'https://api.github.com/users/boninii', true)

    request.onload = function() {
        var data = JSON.parse(this.response);
        
        var name = data.name;
        var bio = data.bio;
        var img = data.avatar_url;

        if (!bio) {
            document.getElementById('bio3').innerHTML = '<p></p>';
        } else {
            document.getElementById('bio3').innerHTML = '<p>"' + bio + '"</p>';
        }

        document.getElementById('name3').innerHTML = '<h2>' + name + '</h2>';
        document.getElementById('img3').innerHTML = '<img src="'+img+'">'
    }

    request.send();
}

function github4() {
    var request = new XMLHttpRequest()

    request.open('GET', 'https://api.github.com/users/Larbos-Naul', true)

    request.onload = function() {
        var data = JSON.parse(this.response);
        
        var name = data.name;
        var bio = data.bio;
        var img = data.avatar_url;

        if (!bio) {
            document.getElementById('bio4').innerHTML = '<p></p>';
        } else {
            document.getElementById('bio4').innerHTML = '<p>"' + bio + '"</p>';
        }

        document.getElementById('name4').innerHTML = '<h2>' + name + '</h2>';
        document.getElementById('img4').innerHTML = '<img src="'+img+'">'
    }

    request.send();
}

function github5() {
    var request = new XMLHttpRequest()

    request.open('GET', 'https://api.github.com/users/RenanCastrov', true)

    request.onload = function() {
        var data = JSON.parse(this.response);
        
        var name = data.name;
        var bio = data.bio;
        var img = data.avatar_url;

        if (!bio) {
            document.getElementById('bio5').innerHTML = '<p></p>';
        } else {
            document.getElementById('bio5').innerHTML = '<p>"' + bio + '"</p>';
        }

        document.getElementById('name5').innerHTML = '<h2>' + name + '</h2>';
        document.getElementById('img5').innerHTML = '<img src="'+img+'">'
    }

    request.send();
}