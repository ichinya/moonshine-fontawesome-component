<?php
// svgs path
$svgsPath = __DIR__ . '/svgs-full/';
// output json path
$outputJsonPath = __DIR__ . '/resources/json';

// Ensure output directory exists
if (!is_dir($outputJsonPath)) {
    echo "Directory {$outputJsonPath} does not exist";
    return;
}

// Define icon categories and their corresponding CSS classes
$categories = [
    'brands' => 'fa-brands',
    'regular' => 'fa-regular',
    'solid' => 'fa-solid'
];

echo "Starting FontAwesome JSON update...\n";

foreach ($categories as $category => $prefix) {
    echo "Processing {$category} icons...\n";

    $categoryPath = $svgsPath . $category;
    $outputFile = $outputJsonPath . '/' . $category . '.json';

    // Check if category directory exists
    if (!is_dir($categoryPath)) {
        echo "Warning: Directory {$categoryPath} not found, skipping...\n";
        continue;
    }

    // Get all SVG files in the category directory
    $svgFiles = glob($categoryPath . '/*.svg');

    if (empty($svgFiles)) {
        echo "Warning: No SVG files found in {$categoryPath}\n";
        continue;
    }

    $icons = [];

    foreach ($svgFiles as $svgFile) {
        // Get filename without extension
        $filename = basename($svgFile, '.svg');

        // Create FontAwesome class name
        $iconClass = $prefix . ' fa-' . $filename;

        $icons[] = $iconClass;
    }

    // Sort icons alphabetically
    sort($icons);

    // Convert to JSON with pretty print
    $jsonContent = json_encode($icons, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    // Write to file
    if (file_put_contents($outputFile, $jsonContent) !== false) {
        echo "Successfully updated {$outputFile} with " . count($icons) . " icons\n";
    } else {
        echo "Error: Failed to write to {$outputFile}\n";
    }
}

echo "FontAwesome JSON update completed!\n";
