document.getElementById("postButton").addEventListener("click", (e) => {

    if(document.getElementById("postContent").value.trim() != ''){

        $.post('tweet.php', {
            content: document.getElementById("postContent").value
        });
        document.getElementById("postContent").value='';
        load();
    }

});

var scrollPositions = [];
var maj = -1;

function load(){

    var currentPosition = window.scrollY || window.pageYOffset;
    scrollPositions.push(currentPosition);

    $.ajax({
        type: "GET",
        url: 'tweet.php?t=true',
        success: function (response) {
            if(response.length != 0){
                if(response.t.length != maj){
                    document.getElementById("all").innerHTML = '';
                    maj = response.t.length;

                    for (let i = 0; i < response.t.length; i++) {
                        if(response.t[i].id_response == null){
                            $('.tweetotal').append('<div id="' + response.t[i].id + '" class="tweet-content"><div><div class="img-pseudo"><div><img class="img-border" src="'+ response.t[i].profile_picture +'" alt="Avatar de l\'utilisateur"></div><div><h3>'+ response.t[i].username +'</h3></div></div><h4>'+ response.t[i].at_user_name +'</h4><p>' +response.t[i].content + '</p></div><img class="img-post" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9MkPKhibIoSnPrqAklQ1iIKRkV2wxtVkHMg&usqp=CAU" alt="Image du tweet"><div class="logo-post"><img id="repost" onclick="commentaire(' + response.t[i].id + ')" src="./images/commentaire.png" alt="commentaire"><img id="retweet" onclick="retweet(' + response.t[i].id + ')" src="./images/retweet.png" alt="retweet"><img id="like" onclick="like(' + response.t[i].id + ')" src="./images/like.png" alt="like"></div>');
                        } 
                    }
                    
                    for (let i = 0; i < response.t.length; i++) {
                        if(response.t[i].id_response != null){
                            $rep = "#" + response.t[i].id_response;
                            $(''+$rep+'').append('<div id="' + response.t[i].id + '" class="tweet-rep"><div><div class="img-pseudo"><div><img class="img-border" src="'+ response.t[i].profile_picture +'" alt="Avatar de l\'utilisateur"></div><div><h3>'+ response.t[i].username +'</h3></div></div><h4>'+ response.t[i].at_user_name +'</h4><p>' +response.t[i].content + '</p></div><img class="img-post" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9MkPKhibIoSnPrqAklQ1iIKRkV2wxtVkHMg&usqp=CAU" alt="Image du tweet"><div class="logo-post"><img id="repost" onclick="commentaire(' + response.t[i].id + ')" src="./images/commentaire.png" alt="commentaire"><img id="retweet" onclick="retweet(' + response.t[i].id + ')" src="./images/retweet.png" alt="retweet"><img id="like" onclick="like(' + response.t[i].id + ')" src="./images/like.png" alt="like"></div>');
                        }
                    }
                    var scrollPosition = scrollPositions.shift() || 0;
                    window.scrollTo(0, scrollPosition);
                }
                else{
                    var scrollPosition = scrollPositions.shift() || 0;
                    window.scrollTo(0, scrollPosition);
                }
            }
            else {
                if(response.length != maj){
                    maj = response.length;
                    document.getElementById("all").innerHTML = '';
                    $('.tweetotal').append('<div class="tweet-content"><div><h1>Suivez des personnes ou tweetez pour commencer votre nouvelle aventure !</h1></div></div>');
                    var scrollPosition = scrollPositions.shift() || 0;
                    window.scrollTo(0, scrollPosition);
                }
                var scrollPosition = scrollPositions.shift() || 0;
                    window.scrollTo(0, scrollPosition);
            }
        }
    });
}

load();

function like(id){
    $.post('tweet.php', {idL: id});
}

function retweet(id){
    $.post('tweet.php', {idR: id});
}



var intervalId = window.setInterval(function(){
    load();
  }, 5000);


function recherche(){
    window.clearInterval(intervalId);
    document.getElementsByClassName("tweet")[0].innerHTML = "";

    var divT = document.createElement('div');
    divT.className = 'tweetotal';
    if(document.getElementById("barre").value.trim() != ""){
        if(document.getElementById("barre").value[0] === "@"){
            $.ajax({
                type: "GET",
                url: 'tweet.php?arobase=' + document.getElementById("barre").value,
                success: function (response) {
                    console.log(response);
                    if(response.length != 0){
                        divT.style = "margin-left: 35%;";
                        document.getElementsByClassName("tweet")[0].append(divT);
                        for (let i = 0; i < response.ar.length; i++) {
                            $('.tweetotal').append('<a href="profil.php?arobase=' + response.ar[i].at_user_name + '"<div class="tweet-content"><div><div class="img-pseudo"><div><img class="img-border" src="' +response.ar[i].profile_picture+'" alt="Avatar de l\'utilisateur"></div><div><h3>'+response.ar[i].username+'</h3></div></div><h4>'+response.ar[i].at_user_name+'</h4></div></div></a>');
                        }
                    }
                    else {
                        divT.style = "margin-left: 0%;";
                        document.getElementsByClassName("tweet")[0].append(divT);
                        $('.tweetotal').append('<div class="tweet-content"><div><h1>Aucun utilisateur trouvé</h1></div></div>');

                    }
                }
            });
        }
    }
}