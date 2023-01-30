import { ToolbarGroup, ToolbarButton, Popover, Button, PanelBody, PanelRow, ColorPalette } from "@wordpress/components"
import { link } from "@wordpress/icons"
import { registerBlockType } from "@wordpress/blocks"
import { RichText, InspectorControls, BlockControls, __experimentalLinkControl as LinkControl } from "@wordpress/block-editor"
import { useState } from "@wordpress/element"

registerBlockType("blocks/genericbutton", {
    title: "Generic Button",
    attributes: {
        text: { type: "string" },
        size: { type: "string", default: "large" },
        linkObject: {
            type: "object",
            default: {
                url: "#",
            }
        },
        colorName: {
            type: "string"
        }
    },
    edit: EditComponent,
    save: SaveComponent
})


function EditComponent(props) {
    const [popoverAnchor, setPopoverAnchor] = useState();
    const [isLinkPickerVisible, setIsLinkPickerVisible] = useState(false)

    function textChange(newText) {
        props.setAttributes({ text: newText })
    }

    function buttonHandler() {
        setIsLinkPickerVisible(prev => !prev)
    }

    function handleLinkChange(newLink) {
        props.setAttributes({ linkObject: newLink })
    }

    const ourColors = [
        { name: "blue", color: "#0d3b66" },
        { name: "grey", color: "#333" }
    ]

    function handleColorChange(colorCode) {
        props.setAttributes({ colorName: colorCode })
    }

    return (
        <>
            <BlockControls>
                <ToolbarGroup>
                    <ToolbarButton ref={setPopoverAnchor} onClick={buttonHandler} icon={link} />
                </ToolbarGroup>
                <ToolbarGroup>
                    <ToolbarButton isPressed={props.attributes.size === "small"} onClick={() => props.setAttributes({ size: "small" })}>Small</ToolbarButton>
                    <ToolbarButton isPressed={props.attributes.size === "medium"} onClick={() => props.setAttributes({ size: "medium" })}>Medium</ToolbarButton>
                    <ToolbarButton isPressed={props.attributes.size === "large"} onClick={() => props.setAttributes({ size: "large" })}>Large</ToolbarButton>
                </ToolbarGroup>
            </BlockControls>
            <InspectorControls>
                <PanelBody title="color" initialOpen={true}>
                    <PanelRow>
                        <ColorPalette colors={ourColors} value={props.attributes.colorName} onChange={handleColorChange} />
                    </PanelRow>
                </PanelBody>
            </InspectorControls>
            <RichText allowedFormats={[]} tagName="a" className={`custom-button custom-button--${props.attributes.size}`} value={props.attributes.text} onChange={textChange} style={{ backgroundColor: props.attributes.colorName }} />
            {isLinkPickerVisible && (
                <Popover anchor={popoverAnchor} onFocusOutside={() => setIsLinkPickerVisible(false)} >
                    <LinkControl settings={[]} value={props.attributes.linkObject} onChange={handleLinkChange} />
                    <Button variant="primary" onClick={() => setIsLinkPickerVisible(false)} style={{ display: "block", width: "100%" }}>Confirm</Button>
                </Popover>
            )}
        </>

    )
}

function SaveComponent(props) {
    return <a href={props.attributes.linkObject.url} className={`custom-button custom-button--${props.attributes.size}`} style={{ backgroundColor: props.attributes.colorName }}>{props.attributes.text}</a>


}