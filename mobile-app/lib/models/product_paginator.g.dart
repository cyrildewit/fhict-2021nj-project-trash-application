// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'product_paginator.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

ProductPaginator _$ProductPaginatorFromJson(Map<String, dynamic> json) {
  return ProductPaginator(
    currentPage: json['current_page'] as int,
    lastPage: json['last_page'] as int,
    products: (json['data'] as List)
        ?.map((e) =>
            e == null ? null : Product.fromJson(e as Map<String, dynamic>))
        ?.toList(),
  );
}

Map<String, dynamic> _$ProductPaginatorToJson(ProductPaginator instance) =>
    <String, dynamic>{
      'current_page': instance.currentPage,
      'last_page': instance.lastPage,
      'data': instance.products,
    };
