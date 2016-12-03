
var app = angular.module('retroBoardApp', []).config( function($interpolateProvider,$locationProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
    $locationProvider.html5Mode(true);
});




app.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keyup", function (event) {
            if(event.which === 13) {
                event.preventDefault();
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });


            }
        });
    };
});

app.directive('bsPopover', ['$timeout', function($timeout) {
    return function(scope, element, attrs) {

        var popBtns = element.find("button[rel=popover]");
        popBtns.popover({ placement: 'left', html: 'false', trigger:'focus click',
            template: '<div class="popover"><div class="arrow"></div><div class="popover-inner"><div class="popover-content"><p></p></div></div></div>'});

        popBtns.on('shown.bs.popover click',function(){
            $timeout(function(){
                popBtns.popover('hide');
                popBtns.blur();
            }, 1000);
        });

    };
}]);

app.controller('boardCtrl', function($scope,$http,$location,$window,$interval) {
    $scope.board = {};
    $scope.sections = [];
    $scope.noteInputs = [];

    $scope.loadBoard = function(){
        $http.get($location.path()+".json")
            .then(function(response) {
                $scope.board = response.data.board;
                $scope.sections = $scope.board.sections;
        });
    };

    $scope.deleteBoard = function(){
        $http.delete("boards/"+ $scope.board.id).then(function(response){
            $window.location.href = "boards/deleted";
        });
    };


    $scope.getRows = function() {
        return Array(parseInt(($scope.sections.length+1)/2));
    };

    $scope.addNote = function(sectionIndex){
        $http.post("notes",
            {"section_id":$scope.sections[sectionIndex].id,
                "message": $scope.noteInputs[sectionIndex]})
            .then(function(response) {
                $scope.loadBoard();
            });

        // clear input field
        $scope.noteInputs[sectionIndex] = "";
        return;
    };

    $scope.deleteNote = function(sectionIndex,messageIndex){
        if (messageIndex > -1 && sectionIndex > -1) {
            var note = $scope.sections[sectionIndex].notes[messageIndex];
            if(note){
                $http.delete("notes/"+note.id)
                    .then(function(response) {
                        $scope.loadBoard();
                    });
            }

        }
        return;
    };

    $scope.upVoteNote = function(sectionIndex,messageIndex){
        if (messageIndex > -1 && sectionIndex > -1) {
            var note = $scope.sections[sectionIndex].notes[messageIndex];
            if(note){
                $http.put("notes/"+note.id)
                    .then(function(response) {
                        $scope.loadBoard();
                    });
            }

        }
        return;
    };

    $interval(function(){$scope.loadBoard();},20000);

});