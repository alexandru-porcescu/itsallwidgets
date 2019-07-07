<?php

function isIAW() {
    return strpos(request()->url(), 'itsallwidgets.') !== false;
}

function isFE() {
    return strpos(request()->url(), 'flutterevents.') !== false;
}

function isFX() {
    return strpos(request()->url(), 'flutterx.') !== false;
}

function isFC() {
    return strpos(request()->url(), 'fluttercollective.') !== false;
}

function isTest() {
    return isValet() || isServe();
}

function isValet() {
    return strpos(request()->url(), '.test') !== false;
}

function isServe() {
    return strpos(request()->url(), '127.0.0.1:') !== false;
}


function iawUrl() {
    return isTest() ? (isValet() ? 'http://itsallwidgets.test' : 'http://127.0.0.1:8000') : 'https://itsallwidgets.com';
}

function feUrl() {
    return isTest() ? (isValet() ? 'http://flutterevents.test' : 'http://127.0.0.1:8000/flutter-events')  : 'https://flutterevents.com';
}

function fxUrl() {
    return isTest() ? (isValet() ? 'http://flutterx.test' : 'http://127.0.0.1:8000/flutterx') : 'https://flutterx.com';
}

function fcUrl() {
    return isTest() ? (isValet() ? 'http://fluttercollective.test' : 'http://127.0.0.1:8000/flutter-collective') : 'https://fluttercollective.com';
}
