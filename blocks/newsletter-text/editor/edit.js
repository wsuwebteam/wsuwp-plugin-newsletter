import { TextControl } from "@wordpress/components";
import { useState, useEffect, useRef } from "@wordpress/element";
import { useSelect, useDispatch } from "@wordpress/data";

const {
	useBlockProps,
	RichText,
    InnerBlocks,
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
		className: 'wsu-newsletter-text-wrapper',
		style: {},
	} );
   

    return (
        <div { ...blockProps } >
            <InnerBlocks
				templateLock={ false }
			/>
            <div className="wsu-newsletter-text__helper">The text section is intended for arbitrary text content. If no additional text is needed remove this container.</div>
        </div>
    );
}
