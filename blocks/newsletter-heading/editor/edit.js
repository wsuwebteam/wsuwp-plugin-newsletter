import { TextControl } from "@wordpress/components";
import { useState, useEffect, useRef } from "@wordpress/element";
import { useSelect, useDispatch } from "@wordpress/data";

const {
	useBlockProps,
	RichText,
	MediaUpload,
	MediaUploadCheck,
	InspectorControls,
	URLInput,
} = wp.blockEditor;

import "./style.scss";


export default function Edit( props ) {

    let {
        attributes,
        setAttributes,
    } = props;

    const blockProps = useBlockProps( {
		className: 'wsu-newsletter-heading-wrapper',
		style: {},
	} );
   

    return (
        <div { ...blockProps } >
            <RichText
                className="wsu-newsletter-heading"
                tagName="h2" // The tag here is the element output and editable in the admin
                value={ attributes.heading } // Any existing content, either from the database or an attribute default
                allowedFormats={ [] } // Allow the content to be made bold or italic, but do not allow other formatting options
                onChange={ ( heading ) => setAttributes( { heading } ) } // Store updated content as a block attribute
                placeholder="Add Heading..." // Display this text before any content has been added by the user
            />
        </div>
    );
}
