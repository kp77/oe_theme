<?php

declare(strict_types = 1);

namespace Drupal\Tests\oe_theme\Unit\Patterns;

use Drupal\oe_theme\ValueObject\ImageValueObject;
use Drupal\oe_theme\ValueObject\GalleryItemValueObject;
use Drupal\Tests\UnitTestCase;

/**
 * Test gallery item value object.
 */
class GalleryItemValueObjectTest extends UnitTestCase {

  /**
   * Test constructing a gallery item value object from an array.
   */
  public function testFromArray() {
    $image_data = [
      'src' => 'http://placehold.it/380x185',
      'name' => 'Test image',
      'alt' => 'Alt text',
      'responsive' => TRUE,
    ];

    /** @var \Drupal\oe_theme\ValueObject\ImageValueObject $image */
    $image = ImageValueObject::fromArray($image_data);

    $data = [
      'icon' => 'camera',
      'caption' => 'Test caption.',
      'classes' => 'example-class',
      'image' => $image,
    ];

    /** @var \Drupal\oe_theme\ValueObject\GalleryItemValueObject $galleryItem */
    $galleryItem = GalleryItemValueObject::fromArray($data);

    $this->assertEquals($data['icon'], $galleryItem::ICON);
    $this->assertEquals($data['caption'], $galleryItem->getCaption());
    $this->assertEquals($data['classes'], $galleryItem->getClasses());
    $this->assertEquals($image_data, $galleryItem->getImage()->getArray());
  }

}
