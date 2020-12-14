// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'ingredient.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

Ingredient _$IngredientFromJson(Map<String, dynamic> json) {
  return Ingredient(
    id: json['id'] as int,
    updatedAt: json['updated_at'] as String,
    createdAt: json['created_at'] as String,
  );
}

Map<String, dynamic> _$IngredientToJson(Ingredient instance) =>
    <String, dynamic>{
      'id': instance.id,
      'updated_at': instance.updatedAt,
      'created_at': instance.createdAt,
    };
