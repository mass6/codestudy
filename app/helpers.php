<?php
use Illuminate\Support\Facades\Request;

/**
 * @param $path
 * @param bool $parent
 * @return string
 */
function isPath($path, $parent = false)
{
    if (Request::is($path))
        return ' active';

    return '';
}


/**
 * @param $text
 * @param int $max_length
 * @return string
 */
function createExcerpt($text, $max_length = 400)
{
    if (strlen(strip_tags($text)) > $max_length) {
        $max_chunk = substr(strip_tags($text), 0, $max_length);

        return substr($max_chunk, 0, strrpos($max_chunk, ' '));
    }

    return strip_tags($text);
}

/**
 * @param $email
 * @param int $size
 * @return string
 */
function gravatar($email, $size = 60)
{
    return "http://www.gravatar.com/avatar/" . md5($email) . "={$size}";
}

/**
 * @return string
 */
function breadcrumbSegment()
{
    if (Request::segment(1) == '' || Request::segment(1) == 'blog')
        return 'blog';

    return Request::segment(count(Request::segments()));
}


function pageTitle($text)
{
    return $text . ' | Webhaolin';
}

/**
 * Retrieves a placeholder image path based on the supplied
 * category name. If no category is provided, or if an image
 * is not found, then a default placeholder image is returned.
 *
 * @param null $category
 * @return string
 */
function placeholderImage($category = null)
{
    $categoryImagePath = '/' . public_path() . '/img/blog/placeholder_' . strtolower($category) . '.png';

    if (file_exists($categoryImagePath))
        return '/img/blog/placeholder_' . strtolower($category) . '.png';

    return '/img/blog/placeholder.png';
}

function postStatusLabel($status)
{
    switch ($status) {
        case 'publish':
            return 'label label-sm label-success bg-green';
        case 'draft':
            return 'label label-sm label-warning bg-yellow';
        default:
            return '';
    }

}

function postVisibilityLabel($visibility)
{
    switch ($visibility) {
        case 'members':
            return 'label label-sm label-primary bg-blue';
        case 'private':
            return 'label label-sm label-warning bg-red';
        default:
            return '';
    }

}