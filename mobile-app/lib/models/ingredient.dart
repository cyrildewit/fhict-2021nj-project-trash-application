import 'package:json_annotation/json_annotation.dart';

part 'ingredient.g.dart';

@JsonSerializable()
class Ingredient {
  int id;

  @JsonKey(name: 'updated_at')
  String updatedAt;

  @JsonKey(name: 'created_at')
  String createdAt;

  Ingredient({
    this.id,
    this.updatedAt,
    this.createdAt,
  });

  factory Ingredient.fromJson(Map<String, dynamic> json) =>
      _$IngredientFromJson(json);

  Map<String, dynamic> toJson() => _$IngredientToJson(this);
}
