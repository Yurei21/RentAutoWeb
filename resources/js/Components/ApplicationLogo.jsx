export default function ApplicationLogo(props) {
    return (
        <>
            <img
                {...props}
                src="/iconlight.png"
                alt="Application Logo"
                className={`hidden dark:block ${props.className || ''}`}
            />
            <img
                {...props}
                src="/icondark.png"
                alt="Application Logo"
                className={`block dark:hidden ${props.className || ''}`}
            />
         </>
    );
}
