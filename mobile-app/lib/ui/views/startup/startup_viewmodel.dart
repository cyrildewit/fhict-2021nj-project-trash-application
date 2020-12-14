import 'package:flutter/material.dart';
import 'package:stacked/stacked.dart';

class StartupViewModel extends IndexTrackingViewModel {
  void navigateToIndex(int value, context) {
    Navigator.pop(context);

    setIndex(value);
  }
}
