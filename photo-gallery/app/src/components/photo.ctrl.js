angular.module("photoApp")
.controller("PhotoCtrl",function($scope)
{   //$scope.imgurl = "src/assets/google.png";


    // $http.get({method: 'GET', url:'data.json'})
    // .success(function (res) {
    // $scope.img = res;                
    // });

    
 

     $scope.images = [
        {id:0,imgurl:"src/assets/0.jpg",alt:"0",usrname:"usr_000",like:56},
        {id:1,imgurl:"src/assets/1.jpg",alt:"1",usrname:"usr_001",like:75},
        {id:2,imgurl:"src/assets/2.jpg",alt:"2",usrname:"usr_002",like:73},
        {id:3,imgurl:"src/assets/3.jpg",alt:"3",usrname:"usr_000",like:88},
        {id:4,imgurl:"src/assets/4.jpg",alt:"4",usrname:"usr_003 444",like:46},
        {id:5,imgurl:"src/assets/5.jpg",alt:"5",usrname:"usr_003",like:25},
        {id:6,imgurl:"src/assets/6.png",alt:"6",usrname:"usr_001",like:47},
        {id:7,imgurl:"src/assets/7.jpg",alt:"7",usrname:"usr_004",like:77},
        {id:8,imgurl:"src/assets/8.png",alt:"8",usrname:"usr_005",like:46},
        {id:9,imgurl:"src/assets/9.jpg",alt:"9",usrname:"usr_006",like:75},
        {id:10,imgurl:"src/assets/10.jpg",alt:"10",usrname:"usr_004",like:54},
        {id:11,imgurl:"src/assets/11.jpg",alt:"11",usrname:"usr_004",like:65},
        {id:12,imgurl:"src/assets/12.jpg",alt:"12",usrname:"usr_004",like:34},
        {id:13,imgurl:"src/assets/13.jpg",alt:"13",usrname:"usr_005",like:50},
        {id:14,imgurl:"src/assets/14.jpg",alt:"14",usrname:"usr_008",like:50},
        {id:15,imgurl:"src/assets/15.jpg",alt:"15",usrname:"usr_009",like:10},
        {id:16,imgurl:"src/assets/16.jpg",alt:"16",usrname:"usr_008",like:40},
        {id:17,imgurl:"src/assets/17.jpg",alt:"17",usrname:"usr_007",like:37},
        {id:18,imgurl:"src/assets/18.jpg",alt:"18",usrname:"usr_004",like:40},
        {id:19,imgurl:"src/assets/android.jpg",alt:"Android",usrname:"usr_010",like:91}
     ];

     $scope.abtinfo = [
        {id:0,name:"Manjush Shetty",imgurl:"src/assets/prof1.png",proffession:"Student"},
        {id:1,name:"Kiran Chavan",imgurl:"src/assets/prof2.jpg",profession:"Student"},
        {id:2,name:"Pritish Waghmare",imgurl:"src/assets/prof1.png",profession:"Student"},
        {id:3,name:"Eliyahoo Awaskar",imgurl:"src/assets/prof2.jpg",profession:"Student"},
     ];

     var key = true;
     $scope.like = function(index)
    {
        /* 19 08 2017 */
        
                document.
                getElementById(index).
                style.backgroundImage = "url(src/assets/like-filled.png)";
                $scope.images[index].like = $scope.images[index].like+1;
                //key=false;
           
 
    }

    $scope.dislike = function(index)
    {
                document.
                getElementById(index).
                style.backgroundImage = "url(src/assets/like-empty.png)";
                $scope.images[index].like = $scope.images[index].like-3;
                if($scope.images[index].like<=0) 
                    {
                        $scope.images[index].like = 0;   // No negtive likes
                    }
                //key=true;
    }

});