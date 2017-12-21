var app = angular.module('retroBoardApp', []).config(function ($interpolateProvider, $locationProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
    $locationProvider.html5Mode(true);
});


// directive for executing a function after the "enter" key is pressed
app.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keyup", function (event) {
            if (event.which === 13) {
                event.preventDefault();
                scope.$apply(function () {
                    scope.$eval(attrs.ngEnter);
                });


            }
        });
    };
});

// create a directive for adding popovers to up-vote icons
app.directive('bsPopover', ['$timeout', function ($timeout) {
    return function (scope, element, attrs) {

        var popBtns = element.find("button[rel=popover]");
        popBtns.popover({
            placement: 'top', html: 'false', trigger: 'focus click',
            template: '<div class="popover"><div class="arrow"></div><div class="popover-inner"><div class="popover-content"><p></p></div></div></div>'
        });

        // hide popover after 1 second
        popBtns.on('shown.bs.popover click', function () {
            $timeout(function () {
                popBtns.popover('hide');
                popBtns.blur();
            }, 1000);
        });

    };
}]);

app.controller('boardCtrl', function ($scope, $http, $location, $window, $interval) {
    $scope.board = {};
    $scope.sections = [];
    $scope.noteInputs = [];
    $scope.order = "id";
    $scope.orderText = "Nothing";

    // reload JSON for board
    $scope.loadBoard = function () {
        $http.get($location.path() + ".json")
            .then(function (response) {
                $scope.board = response.data.board;
                $scope.sections = $scope.board.sections;
            });
    };

    $scope.deleteBoard = function () {
        $http.delete("boards/" + $scope.board.id).then(function (response) {
            if (response.data.status === "Success") {
                $window.location.href = "boards/deleted";
            }
        });
    };


    $scope.getRows = function () {
        return Array(parseInt(($scope.sections.length + 1) / 2));
    };

    $scope.addNote = function (sectionIndex) {

        if ($scope.noteInputs[sectionIndex] === "" || $scope.noteInputs[sectionIndex] === undefined ) {
            return;
        }
        else {
            $http.post("notes",
                {
                    "section_id": $scope.sections[sectionIndex].id,
                    "message": $scope.noteInputs[sectionIndex]
                })
                .then(function (response) {
                    $scope.loadBoard();
                });


            // clear input field after adding a note
            $scope.noteInputs[sectionIndex] = "";
            return;
        }
    };

    $scope.deleteNote = function (sectionIndex, noteId) {
        if (noteId > -1 && sectionIndex > -1) {
            $http.delete("notes/" + noteId)
                .then(function (response) {
                    $scope.loadBoard();
                });
        }
        return;
    };

    $scope.upVoteNote = function (sectionIndex, noteId) {
        if (noteId > -1 && sectionIndex > -1) {
            $http.put("notes/" + noteId)
                .then(function (response) {
                    $scope.loadBoard();
                });
        }
        return;
    };

    $scope.setSort = function(order,orderText){
        $scope.order = order;
        $scope.orderText = orderText
    }

    // refresh board every 10 seconds
    $interval(function () {
        $scope.loadBoard();
    }, 10000);

});