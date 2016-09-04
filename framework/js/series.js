/*global angular */
(function () {
  "use strict";
  var app = angular.module("customCricketApp", ['ngRoute', 'ngResource']);
  app.controller("getSeriesCtrl", function ($scope, $http) {
    $scope.clicked = 0;
    $scope.retrieveMatches = "retrive";

    var url = "json/series.json";
    $http.get(url).then(function (response) {
        $scope.series = response.data;
      }
       );

    $scope.getMatches = function (n) {
      $scope.matchesView = 1;
      $scope.scorecardView = 1;
      $scope.retrieveMatches = n;

      for (var i = 0; i < $scope.series.length; i++) {
        if ($scope.series[i].id == $scope.retrieveMatches) {
          $scope.teamOne = $scope.series[i].host;
          $scope.teamTwo = $scope.series[i].opponent;
          $scope.seriesId = i;
          break;
        }
      }
    };

    $scope.unitsPerPage = 4;
    $scope.currentPage = 0;

    $scope.range = function () {
      var rangeSize = Math.round($scope.series.length / $scope.unitsPerPage);
      var ret = [];
      var start = $scope.currentPage;
      if (start > $scope.pageCount() - rangeSize) {
        start = $scope.pageCount() - rangeSize + 1;
      }
      for (var i = start; i < start + rangeSize; i++) {
        ret.push(i);
      }
      return ret;
    };

    $scope.prevPage = function () {
      if ($scope.currentPage > 0) {
        $scope.currentPage--;
      }
    };

    $scope.prevPageDisabled = function () {
      return $scope.currentPage == 0 ? "disabled" : "";
    };

    $scope.nextPage = function () {
      if ($scope.currentPage < $scope.pageCount()) {
        $scope.currentPage++;
      }
    };

    $scope.nextPageDisabled = function () {
      return $scope.currentPage == $scope.pageCount() ? "disabled" : "";
    };

    $scope.pageCount = function () {
      return Math.ceil($scope.series.length / $scope.unitsPerPage) - 1;
    };

    $scope.setPage = function (n) {
      $scope.currentPage = n;
    };
  });

  app.controller("getCricketNews"
    , function ($scope, $http) {
      $http.get('http://cricapi.com/api/cricketNews')
        .then(
          function (response) {
            $scope.news = response.data;
          }
          , function (response) {
            // error handling routine
          });
    });

  app.controller("getLiveCricket"
    , function ($scope, $http) {
      $http.get('http://cricapi.com/api/cricket')
        .then(
          function (response) {
            $scope.live = response.data;
          }
          , function (response) {
            // error handling routine
          });
    });

  app.filter("offset", function () {
    return function (input, start) {
      start = parseInt(start, 10);
      return input.slice(start);
    };
  });

  app.controller("getMatchesCtrl", function ($scope, $http) {

    var url = "json/matches.json";
    $http.get(url).then(function (response) {
        $scope.matches = response.data;
      }
      , function (response) {});

    $scope.getTodaysMatch = function () {
      $scope.todayTeam = "hello";
      $scope.todayMatchDisplay = 0;
      var today = new Date();
      var a = 1;
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();

      if (dd < 10) {
        dd = '0' + dd
      }

      if (mm < 10) {
        mm = '0' + mm
      }

      var todayD = mm + '/' + dd + '/' + yyyy;
      for (var i = 0; i < $scope.matches.length; i++) {
        if ($scope.matches[i].date == todayD) {
          $scope.todayTeamOne = $scope.matches[i].teamOne;
          $scope.todayTeamTwo = $scope.matches[i].teamTwo;
          $scope.todayVenue = $scope.matches[i].venue;
          $scope.todayMatchType = $scope.matches[i].matchType;
          $scope.todayLocation = $scope.matches[i].location;
          $scope.todayMatchDisplay = 1;

        }
      }

      $http.get('http://api.openweathermap.org/data/2.5/weather?q=' + $scope.todayLocation + ',' + $scope.todayTeamOne + '&appid=3f8899d1481ae0589fe02d8b90aeb1ab')
        .then(
          function (response) {
            $scope.weatherDetails = response.data;
          }
          , function (response) {
            // error handling routine
          });
    };
  });

  app.controller("getScorecardCtrl", function ($scope, $http) {
    $scope.display = 1;

    var url = "json/scorecards.json";
    $http.get(url).then(function (response) {
        $scope.scorecards = response.data;
      }
      , function (response) {});

    var url = "json/playerScorecard.json";
    $http.get(url).then(function (response) {
        $scope.playerScorecard = response.data;
      }
      , function (response) {});
  });


  app.config(['$routeProvider', function ($routeProvider)
    {
      $routeProvider.when('/info/:matchId', {
        templateUrl: 'templates/scorecardtemplate.html'
        , controller: 'scorecardController'
      });
}]);

  app.controller('scorecardController', function ($scope, $routeParams) {
    $scope.infoScorecard = $routeParams.matchId;
  });

  app.factory("Subscribe", function ($resource) {
    return $resource(
      'http://localhost:8080/6.3/api/cricketApi.php/subscribedusers/Email/:Email', {
        Email: '@Email'
      }, {
        update: {
          method: "PUT"
        }
      }
    );
  });

  app.controller("getCtrl1", function ($scope, Subscribe) {
    $scope.pers = Subscribe.query();
  });

  app.controller("postCtrl", function ($scope, Subscribe) {
    $scope.addPerson = function () {
      Subscribe.save({}, $scope.person1);
    };
  });
}());