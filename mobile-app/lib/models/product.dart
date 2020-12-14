import 'package:json_annotation/json_annotation.dart';

part 'product.g.dart';

@JsonSerializable()
class Product {
  int id;

  @JsonKey(name: 'barcode')
  String barcode;

  @JsonKey(name: 'description', nullable: true)
  String description;

  @JsonKey(name: 'origin_locale')
  String originLocale;

  @JsonKey(name: 'thumbnail_tiny_url')
  String thumbnailTinyUrl;

  @JsonKey(name: 'thumbnail_small_url')
  String thumbnailSmallUrl;

  @JsonKey(name: 'thumbnail_medium_url')
  String thumbnailMediumUrl;

  @JsonKey(name: 'thumbnail_large_url')
  String thumbnailLargeUrl;

  @JsonKey(name: 'updated_at')
  String updatedAt;

  @JsonKey(name: 'created_at')
  String createdAt;

  // List<ProductLanguage> languages;

  // List<IngredientAnnotation> ingredientAnnotations;

  Product({
    this.id,
    this.barcode,
    this.description,
    this.thumbnailTinyUrl,
    this.thumbnailSmallUrl,
    this.thumbnailMediumUrl,
    this.thumbnailLargeUrl,
    this.updatedAt,
    this.createdAt,
    // this.languages,
    // this.ingredientAnnotations,
  });

  factory Product.fromJson(Map<String, dynamic> json) =>
      _$ProductFromJson(json);

  Map<String, dynamic> toJson() => _$ProductToJson(this);
}
