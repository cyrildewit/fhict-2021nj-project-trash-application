// GENERATED CODE - DO NOT MODIFY BY HAND

// **************************************************************************
// AutoRouteGenerator
// **************************************************************************

// ignore_for_file: public_member_api_docs

import 'package:auto_route/auto_route.dart';
import 'package:flutter/material.dart';

import '../ui/views/home/home_view.dart';
import '../ui/views/login/login_view.dart';
import '../ui/views/nfc_links/nfc_links_view.dart';
import '../ui/views/settings/settings_view.dart';
import '../ui/views/startup/startup_view.dart';
import '../ui/views/statistics/statistics_view.dart';

class Routes {
  static const String startupView = '/';
  static const String homeView = '/home-view';
  static const String statisticsView = '/statistics-view';
  static const String nfcLinksView = '/nfc-links-view';
  static const String settingsView = '/settings-view';
  static const String loginView = '/login-view';
  static const all = <String>{
    startupView,
    homeView,
    statisticsView,
    nfcLinksView,
    settingsView,
    loginView,
  };
}

class Router extends RouterBase {
  @override
  List<RouteDef> get routes => _routes;
  final _routes = <RouteDef>[
    RouteDef(Routes.startupView, page: StartupView),
    RouteDef(Routes.homeView, page: HomeView),
    RouteDef(Routes.statisticsView, page: StatisticsView),
    RouteDef(Routes.nfcLinksView, page: NfcLinksView),
    RouteDef(Routes.settingsView, page: SettingsView),
    RouteDef(Routes.loginView, page: LoginView),
  ];
  @override
  Map<Type, AutoRouteFactory> get pagesMap => _pagesMap;
  final _pagesMap = <Type, AutoRouteFactory>{
    StartupView: (data) {
      return MaterialPageRoute<dynamic>(
        builder: (context) => const StartupView(),
        settings: data,
      );
    },
    HomeView: (data) {
      return MaterialPageRoute<dynamic>(
        builder: (context) => HomeView(),
        settings: data,
      );
    },
    StatisticsView: (data) {
      return MaterialPageRoute<dynamic>(
        builder: (context) => StatisticsView(),
        settings: data,
      );
    },
    NfcLinksView: (data) {
      return MaterialPageRoute<dynamic>(
        builder: (context) => NfcLinksView(),
        settings: data,
      );
    },
    SettingsView: (data) {
      return MaterialPageRoute<dynamic>(
        builder: (context) => SettingsView(),
        settings: data,
      );
    },
    LoginView: (data) {
      return MaterialPageRoute<dynamic>(
        builder: (context) => LoginView(),
        settings: data,
      );
    },
  };
}
