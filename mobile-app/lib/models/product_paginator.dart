import 'package:project_trash/models/product.dart';
import 'package:json_annotation/json_annotation.dart';

part 'product_paginator.g.dart';

@JsonSerializable()
class ProductPaginator {
  @JsonKey(name: 'current_page')
  int currentPage;

  @JsonKey(name: 'last_page')
  int lastPage;

  @JsonKey(name: 'data')
  List<Product> products;

  ProductPaginator({
    this.currentPage,
    this.lastPage,
    this.products,
  });

  factory ProductPaginator.fromJson(Map<String, dynamic> json) =>
      _$ProductPaginatorFromJson(json);

  Map<String, dynamic> toJson() => _$ProductPaginatorToJson(this);
}
