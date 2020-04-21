//moduli jossa mukana ngRoute reititystä varten
var regApp = angular.module('regApp', ['ngRoute']);
// configure our routes
regApp.config(function($routeProvider) {
    $routeProvider

        // route for the home page
        .when('/', {
            templateUrl: 'pages/show.html',
            controller: 'showFormController'
        })

        // route for the about page
        .when('/form', {
            templateUrl: 'pages/form.html',
            controller: 'showFormController'
        })

        // route for the login page
        .when('/login', {
            templateUrl: 'pages/login.html',
            controller: 'loginController'
        })

        .when('/admin', {
            templateUrl: 'pages/admin.html',
            controller: 'adminController'
        });
});



/*
 * Kaikki yhteydet backendiin ovat dataservicessä
 * controllerin scope-funktiot käyttävät dataserviceä
 * controllerin funktiot ovat saman nimisiä kuin dataservicessä
 */

regApp.factory('dataService', function($http) {
    return {
        read: function() {
            //palautetaan promise
            return $http.get('databaseFiles/showDetails.php')
                .then(function(result) {
                    return result.data;
                }, function(error) {
                    console.log('Error' + error);
                });
        },
        create: function(formdata) {
            //lähetetään data backendiin, palautetaan promise
            return $http({
                method: 'post',
                url: 'databaseFiles/insertDetails.php',
                data: formdata
            }).then(function(result) {
                return result.data;
            }, function(error) {
                console.log('Error' + error);
            });
        },
        del: function(ilmo) {
            return $http({
                method: 'delete',
                url: 'databaseFiles/deleteDetails.php/' + ilmo.id,
                data: ilmo
            }).then(function(result) {
                return result.data;
            });
        },
        update: function(formdata) {
            return $http({
                method: 'put',
                url: 'databaseFiles/updateDetails.php/' + formdata.id,
                data: formdata
            }).then(function(result) {
                return result.data;
            });
        }
    };
});

regApp.factory('authService', function() {

    //servicen pitää aina palauttaa olio
    //Tässa tyhjä olio kun service on vain tyhjä runko
    return {};

});

//etusivun eli show-sivun kontrolleri voisi olla erillinen mutta tässä on yhdistetty lomakesivun kontrolleriin
//koska halutaan että $location.path('/'); vaihtaa sivun ilman reffausta ja samalla
//scopen data päivittyy
/*
regApp.controller('showController', ['$scope', 'dataService', function($scope, dataService) {

    //promisen käyttö
    dataService.read().then(function(data) {
        $scope.ilmot = data;
    });

}]);
*/

//lomakesivun controller
regApp.controller('showFormController', ['$scope', '$location', 'dataService', function($scope, $location, dataService) {

    //promisen käyttö tiedon hakuun show-sivulle
    dataService.read().then(function(data) {
        $scope.ilmot = data;
    });

    //tiedon lähetys lomakkeelta kun create() -funktion nappia painetaan
    $scope.create = function() {
        //console.log("Toimiiko");

        if ($scope.formdata.sauna === undefined) {
            $scope.formdata.sauna = "ei";

        } else if ($scope.formdata.sauna === true) {
            $scope.formdata.sauna = "joo";

        }
        //promisen käyttö
        dataService.create($scope.formdata).then(function(data) {
            $scope.ilmot = data; //uusi data tulee scopeen
            //heitetään käyttäjä show-sivulle kun create tehty ja uusi data saatu
            //kun show-sivu on samassa scopessa, se saa uuden datan heti
            $location.path('/');
        });
    };
    //säännönmukaiset lausekkeet input-datan validointiin
    $scope.namePattern = /^([a-öA-Ö ,.'-]{3,50})$/;
    $scope.emailPattern = /^([a-zA-Z0-9])+([a-zA-Z0-9._%+-])+@([a-zA-Z0-9_.-])+\.(([a-zA-Z]){2,6})$/;

}]);

//loginsivun controller
regApp.controller('loginController', ['$scope', 'authService', function($scope, authService) {
  $scope.credentials = {
    username: 'sa',
    password: 'sa'
  };
  $scope.login = function (credentials) {
    AuthService.login(credentials).then(function (user) {
      $rootScope.$broadcast(AUTH_EVENTS.loginSuccess);
      $scope.setCurrentUser(user);
    }, function () {
      $rootScope.$broadcast(AUTH_EVENTS.loginFailed);
    });
  };


}]);

//adminsivun controller
regApp.controller('adminController', ['$scope', 'dataService', function($scope, dataService) {

    //Nappien alkutilanne
    $scope.createbtn = true;
    $scope.updatebtn = false;

    $scope.read = function() {

        dataService.read().then(function(data) {
            $scope.ilmot = data;
        });

    };

    $scope.read(); //luetaan uusin data aina ensin kun tullaan admin-tilaan

    $scope.create = function() {
        if ($scope.formdata.sauna === undefined) {
            $scope.formdata.sauna = "ei";

        } else if ($scope.formdata.sauna === true) {
            $scope.formdata.sauna = "joo";
        }
        dataService.create($scope.formdata).then(function(data) {
            $scope.ilmot = data;
            $scope.read();
        });
    };

    $scope.del = function(ilmo) {
        dataService.del(ilmo).then(function(data) {
            $scope.ilmot = data; // uusi data scopeen
            $scope.read(); // deletoinnin jälkeen luetaan sivulle uusi data
        });
    };

    $scope.updateform = function(ilmo) {

        $scope.formdata = {}; // määritellään formdata -olio

        $scope.formdata.id = ilmo.id;
        $scope.formdata.nimi = ilmo.nimi;
        $scope.formdata.email = ilmo.email;
        $scope.formdata.ruoka = ilmo.ruoka;

        if (ilmo.sauna === 'joo') {
            $scope.formdata.sauna = true;
        } else if (ilmo.sauna === 'ei') {
            $scope.formdata.sauna = false;
        }

        $scope.createbtn = false;
        $scope.updatebtn = true;// aktivoidaan updatebtn
    };

    $scope.update = function() {
        if ($scope.formdata.sauna === false) {
            $scope.formdata.sauna = 'ei';

        } else if ($scope.formdata.sauna === true) {
            $scope.formdata.sauna = 'joo';
        }

        dataService.update($scope.formdata).then(function(data) {
            $scope.ilmot = data; // uusi data scopeen
            $scope.read(); // updaten jälkeen luetaan sivulle uusi data
            $scope.createbtn = true; // palataan perustilaan eli voidaan luoda uusi tietue
            $scope.updatebtn = false;
            $scope.formdata = {};
        });
    };
}]);
