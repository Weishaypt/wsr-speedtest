/**
 * JavaScript - ASCII Art Editor
 *
 * Your task is to implement all methods marked with @todo. You must not change any other method.
 * You may add as many methods to the ASCIIArtEditor class as you want.
 */


/**
 * Constructor function to create a new ASCIIArtEditor
 * @constructor
 */
var ASCIIArtEditor = function () {
    /**
     * When transforming images this property should be used as line
     * separator for all operations
     * @type {string}
     */
    this.lineSeperator = '\n';
};


/**
 * This function takes an arbitrary ASCII Art string as input and must
 * return a mirrored version of the given image.
 *
 * It should be possible to choose the mirror-axis with the second argument.
 *
 * The function should use the configured lineSeparator property on
 * the ASCIIArtEditor object.
 *
 * Example on 'x' axis:
 *   Input:                 Output:
 *     # --····-- $           # --====-- $
 *     #  +    -  $           #  +    -  $
 *     # --====-- $           # --····-- $
 *
 * Example on 'y' axis:
 *   Input:                 Output:
 *     # --····-- $           $ --····-- #
 *     #  +    -  $           $  -    +  #
 *     # --====-- $           $ --====-- #
 *
 * @param {string} image - the source image
 * @param {'x'|'y'} [axis='y'] - the axis to be used for the mirror operation, defaults to 'y'
 * @return string - the mirrored input image
 *
 * @throws Error - If an invalid axis was provided
 *
 * @todo
 */
ASCIIArtEditor.prototype.mirror = function (image, axis) {
    // <---- Implement this method

    if (!['x', 'y'].includes(axis)) throw new Error('invalid axis')

    let arr = image.split(this.lineSeperator)
    let result = '';

    if(axis === "x") {
        result = arr
            .reverse()
            .join(this.lineSeperator)
    }
    else {
        result =
            arr
                .map(str =>
                        str.split('')
                            .reverse()
                            .join('')
                    )
                .join(this.lineSeperator)
    }

    return result;
};


ASCIIArtEditor.prototype.f = function (s, o = [], a = '') {
    return /./.test(s)
        ? this.f(s.replace(/^./gm, x => (a = x + a) && ''), [...o, a])
        : o.join(this.lineSeperator)
};

/**
 * Takes any SQUARE ASCII image and must rotate the image by the
 * given angle (only multiple of 90 allowed).
 *
 * The rotation should always be clockwise.
 *
 * Example:
 *   Input:    90deg:    180deg:    270deg:    360deg:
 *     #-*       $-#       *-$        ***         #-*
 *     --*       ---       *--        ---         --*
 *     $-*       ***       *-#        #-$         $-*
 *
 * @param {string} image
 * @param {number} angle, has to be one of 0, 90, 180, 270, 360
 * @return string
 *
 * @throws Error - If an invalid angle was provided
 *
 * @todo
 */
ASCIIArtEditor.prototype.rotate = function(image, angle) {
    angle = Number(angle);
    // <---- Implement this method
    if(![0, 90, 180, 270, 360].includes(angle)) throw new Error('invalid angle')

    let result = '';
    if(angle === 90) {
        result = this.f(image)
    }
    else if(angle === 180) {
        result = this.f(image)
        result = this.f(result)
    }
    else if(angle === 270) {
        result = this.f(image)
        result = this.f(result)
        result = this.f(result)
    }
    else if(angle === 360 || angle === 0) {
        result = this.f(image)
        result = this.f(result)
        result = this.f(result)
        result = this.f(result)
    }

    return result;
};