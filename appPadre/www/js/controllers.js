angular.module('starter.controllers', [])

.controller('menuCtrl', function($scope) {

  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //$scope.$on('$ionicView.enter', function(e) {
  //}

})
.controller('insercaoCtrl', function($state, $scope, $http) {
    $scope.data = {};

  $scope.goInsercao = function() {
    $state.go('app.insercao');
  };

  $scope.goFim = function() {

    $state.go('app.fim');
    $scope.cpfCnpj = '';
    $scope.data = '';
    $scope.valor = '';
    $scope.coo = '';


  };
    $scope.goApp = function() {
      $state.go('app.doacoes');
    };
    $scope.myGoBack = function() {
      $state.go('app.doacoes');
    };

    $scope.submit = function(){
        var link = 'http://localhost:8000/panel/pages/receiver.php';

        $http.get(link, {params: {qr: $scope.data.qr, id: '3', msg: 'vicenzo'}}).then(function (res){
            if (res.data != "")
              $scope.response = res.data;
            else $scope.response = "Erro de processamento interno!";
        });
    };

})
.controller('homeCtrl', function($state, $scope) {

    $scope.goApp = function() {
      $state.go('app.doacoes');
    }

})

.controller("sobreCtrl", function ($scope) {

  $scope.openFacebook = function () {
    //window.open('https://www.facebook.com/padreharoldo/', '_self');
    window.open('https://www.facebook.com/padreharoldo/');
  };

  $scope.openTwitter = function () {
    window.open('https://twitter.com/padreharoldo');
  };

  $scope.openInstagram = function () {
    window.open('https://www.instagram.com/institutopadreharoldo/');
  };

  $scope.openLinkedin = function () {
    window.open('https://www.linkedin.com/company/instituto-padre-haroldo');
  };

});
