var PhotoApp = angular.module("PhotoApp",[])
var PhotoApp = angular.module('PhotoApp', []);
PhotoApp.controller('PhotoCtrl',
    function ($scope, $http) {

        var request = {
            method: 'get',
            url: 'src/components/photo/data.json',
            dataType: 'json',
            contentType: "application/json"
        };

        $scope.images = new Array;

        $http(request)
            .then(function (jsonData) {
                $scope.images = jsonData.data;
                //$scope.list = $scope.images;
                //console.log($scope.images);
            });


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